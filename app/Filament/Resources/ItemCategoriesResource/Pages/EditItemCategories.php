<?php

namespace App\Filament\Resources\ItemCategoriesResource\Pages;

use App\Filament\Resources\ItemCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemCategories extends EditRecord
{
    protected static string $resource = ItemCategoriesResource::class;

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
