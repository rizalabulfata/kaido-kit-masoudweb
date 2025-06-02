<?php

namespace App\Filament\Resources\ItemsResource\Pages;

use App\Filament\Resources\ItemsResource;
use App\Models\ItemCategory;
use App\Models\Items;
use App\Services\ApiService;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;

class ListItems extends ListRecords
{
    protected static string $resource = ItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('detect_stock')
                ->label('Detect Stock')
                ->form([
                    Select::make('item_categories_id')
                        ->options(ItemCategory::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    FileUpload::make('image')
                        ->directory('uploads')
                        ->preserveFilenames()

                ])
                ->action(fn($data) => $this->doAction($data))

        ];
    }

    protected function doAction($data)
    {
        [$success, $result] = ApiService::predit($data);

        if (!$success) {
            Notification::make()
                ->title('Gagal deteksi')
                ->body($result)
                ->danger()
                ->send();
            $this->halt();
        }

        $res = [];
        foreach ($result as $r) {
            $item = Items::where([
                'sku' => $r['class_name'],
                'item_categories_id' => $data['item_categories_id']
            ])->first();
            if (!empty($item)) {
                $item->increment('stock');

                if (!isset($res[$r['class_name']])) {
                    $res[$r['class_name']] = 1;
                } else {
                    ++$res[$r['class_name']];
                }
            }
        }

        $title = !empty($res) ? 'Sukses deteksi stock' : 'Tidak ditemukan stock cocok';
        Notification::make()
            ->title($title)
            ->body(json_encode($res))
            ->success()
            ->send();
    }
}
