<?php

namespace App\Filament\Resources\ItemCategoriesResource\Pages;

use App\Filament\Resources\ItemCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateItemCategories extends CreateRecord
{
    protected static string $resource = ItemCategoriesResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
