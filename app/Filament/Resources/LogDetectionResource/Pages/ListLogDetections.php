<?php

namespace App\Filament\Resources\LogDetectionResource\Pages;

use App\Filament\Resources\LogDetectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLogDetections extends ListRecords
{
    protected static string $resource = LogDetectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
