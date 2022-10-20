<?php

namespace App\Filament\Resources\CarGenerationResource\Pages;

use App\Filament\Resources\CarGenerationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarGenerations extends ListRecords
{
    protected static string $resource = CarGenerationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
