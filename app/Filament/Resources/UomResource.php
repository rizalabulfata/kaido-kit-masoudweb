<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UomResource\Pages;
use App\Filament\Resources\UomResource\RelationManagers;
use App\Models\UOM;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UomResource extends Resource
{
    protected static ?string $model = UOM::class;

    protected static ?string $label = 'Unit of Measurement';

    protected static ?string $navigationIcon = 'heroicon-o-scale';

    protected static ?string $navigationGroup = "Master";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('info')
                    ->description('Basic Information')
                    ->schema([
                        TextInput::make('code')->maxLength(20)
                            ->required(),
                        TextInput::make('name')->required(),
                        Textarea::make('description'),
                    ])
                    ->columns()
                    ->compact()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code'),
                TextColumn::make('name'),
                TextColumn::make('description')->limit(20)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUoms::route('/'),
            'create' => Pages\CreateUom::route('/create'),
            'edit' => Pages\EditUom::route('/{record}/edit'),
        ];
    }
}
