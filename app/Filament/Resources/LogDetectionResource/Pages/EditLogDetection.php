<?php

namespace App\Filament\Resources\LogDetectionResource\Pages;

use App\Filament\Resources\LogDetectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogDetection extends EditRecord
{
    protected static string $resource = LogDetectionResource::class;

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
