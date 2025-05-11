<?php

namespace App\Filament\Resources\ItemCategoriesResource\Pages;

use App\Filament\Resources\ItemCategoriesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemCategories extends ListRecords
{
    protected static string $resource = ItemCategoriesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
