<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemsResource\Pages;
use App\Filament\Resources\ItemsResource\RelationManagers;
use App\Models\ItemCategory;
use App\Models\Items;
use App\Models\UOM;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemsResource extends Resource
{
    protected static ?string $model = Items::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('info')
                    ->description('Basic Information')
                    ->schema([
                        TextInput::make('name')->required(),
                        TextInput::make('sku')->required(),
                        Select::make('item_categories_id')
                            ->label('Category')
                            ->options(
                                ItemCategory::all()->pluck('name', 'id')
                            )
                            ->live()->searchable()
                            ->required(),
                        Select::make('uoms_id')
                            ->label('Satuan')
                            ->options(
                                UOM::all()->pluck('name', 'id')
                            )
                            ->live()->searchable()
                            ->required(),
                        Textarea::make('description'),
                    ])
                    ->columns()
                    ->compact(),
                Section::make('stcok')
                    ->description('Stock information')
                    ->schema([
                        TextInput::make('stock')
                            ->integer()->minValue(0)
                            ->default(0),
                        TextInput::make('stock_alert_threshold')
                            ->label('Batas bawah stock')
                            ->integer()->minValue(0)
                            ->default(0)

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
                TextColumn::make('sku'),
                TextColumn::make('uom.name'),
                TextColumn::make('category.name'),
                TextColumn::make('stock'),
                TextColumn::make('description')->limit(20),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItems::route('/create'),
            'edit' => Pages\EditItems::route('/{record}/edit'),
        ];
    }
}
