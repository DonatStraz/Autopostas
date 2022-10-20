<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\CarMake;
use App\Models\CarModel;
use Filament\Resources\Form;
use App\Models\CarGeneration;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Livewire\TemporaryUploadedFile;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\BelongsToSelect;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CarGenerationResource\Pages;
use App\Filament\Resources\CarGenerationResource\RelationManagers;

class CarGenerationResource extends Resource
{
    protected static ?string $model = CarGeneration::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
                Card::make()->schema([
                Select::make('model_id')
                ->label('model')
                ->options(CarModel::all()->pluck('name', 'id'))
                ->searchable(),
                TextInput::make('name'),
                FileUpload::make('image')->image()

            ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('CarModel.name')->sortable(),
                ImageColumn::make('image')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCarGenerations::route('/'),
            'create' => Pages\CreateCarGeneration::route('/create'),
            'edit' => Pages\EditCarGeneration::route('/{record}/edit'),
        ];
    }
}
