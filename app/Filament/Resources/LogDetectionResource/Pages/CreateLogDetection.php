<?php

namespace App\Filament\Resources\LogDetectionResource\Pages;

use App\Filament\Resources\LogDetectionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLogDetection extends CreateRecord
{
    protected static string $resource = LogDetectionResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
