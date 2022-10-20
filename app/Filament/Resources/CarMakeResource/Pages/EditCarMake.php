<?php

namespace App\Filament\Resources\CarMakeResource\Pages;

use App\Filament\Resources\CarMakeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarMake extends EditRecord
{
    protected static string $resource = CarMakeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
