<?php

namespace App\Filament\Resources\CarModelResource\Pages;

use App\Filament\Resources\CarModelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarModels extends ListRecords
{
    protected static string $resource = CarModelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
