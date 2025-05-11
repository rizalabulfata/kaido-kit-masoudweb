<?php

namespace App\Filament\Resources\ItemsResource\Pages;

use App\Filament\Resources\ItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItems extends EditRecord
{
    protected static string $resource = ItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
