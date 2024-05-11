<?php

namespace App\Filament\Resources\FifteenMillionResource\Pages;

use App\Filament\Resources\FifteenMillionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAchiever extends EditRecord
{
    protected static string $resource = FifteenMillionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
