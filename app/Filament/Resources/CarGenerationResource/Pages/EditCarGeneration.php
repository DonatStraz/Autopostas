<?php

namespace App\Filament\Resources\CarGenerationResource\Pages;

use App\Filament\Resources\CarGenerationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarGeneration extends EditRecord
{
    protected static string $resource = CarGenerationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
