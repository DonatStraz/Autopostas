<?php

namespace App\Filament\Resources\CarModelResource\Pages;

use App\Filament\Resources\CarModelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarModel extends EditRecord
{
    protected static string $resource = CarModelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
