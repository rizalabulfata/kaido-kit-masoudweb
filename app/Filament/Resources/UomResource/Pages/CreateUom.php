<?php

namespace App\Filament\Resources\UomResource\Pages;

use App\Filament\Resources\UomResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUom extends CreateRecord
{
    protected static string $resource = UomResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
