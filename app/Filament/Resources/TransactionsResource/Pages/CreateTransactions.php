<?php

namespace App\Filament\Resources\TransactionsResource\Pages;

use App\Filament\Resources\TransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactions extends CreateRecord
{
    protected static string $resource = TransactionsResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
