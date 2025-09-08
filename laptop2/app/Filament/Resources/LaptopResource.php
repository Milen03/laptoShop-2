<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaptopResource\Pages;
use App\Filament\Resources\LaptopResource\RelationManagers;
use App\Models\Laptop;
use Filament\Forms;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaptopResource extends Resource
{
    protected static ?string $model = Laptop::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('brand')
                    ->required(),
                Forms\Components\TextInput::make('model')
                    ->required(),
                Forms\Components\TextInput::make('processor')
                    ->required(),
                Forms\Components\TextInput::make('ram')
                    ->required(),
                Forms\Components\TextInput::make('storage')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('BGN'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('laptops'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('processor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ram')
                    ->searchable(),
                Tables\Columns\TextColumn::make('storage')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('BGN')
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('brand')
                ->options([
                    'Dell' => 'Dell',
                    'HP' => 'HP',
                    'Apple' => 'Apple',
                    'Lenovo' => 'Lenovo',
                    'Asus' => 'Asus',
                    'Acer' => 'Acer',
                    'MSI' => 'MSI',
                    'Razer' => 'Razer',
                ])
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
            'index' => Pages\ListLaptops::route('/'),
            'create' => Pages\CreateLaptop::route('/create'),
            'edit' => Pages\EditLaptop::route('/{record}/edit'),
        ];
    }
}
