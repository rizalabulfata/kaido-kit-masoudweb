<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemCategoriesResource\Pages;
use App\Filament\Resources\ItemCategoriesResource\RelationManagers;
use App\Models\ItemCategory;
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

class ItemCategoriesResource extends Resource
{
    protected static ?string $model = ItemCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('info')
                    ->description('Basic Information')
                    ->schema([
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
                TextColumn::make('name'),
                TextColumn::make('description')
                    ->limit(20),
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
            'index' => Pages\ListItemCategories::route('/'),
            'create' => Pages\CreateItemCategories::route('/create'),
            'edit' => Pages\EditItemCategories::route('/{record}/edit'),
        ];
    }
}
