<?php

namespace App\Filament\Resources\LogDetectionResource\Pages;

use App\Filament\Resources\LogDetectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLogDetection extends ViewRecord
{
    protected static string $resource = LogDetectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
