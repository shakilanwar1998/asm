<?php

namespace App\Filament\Resources\FifteenMillionResource\Pages;

use App\Filament\Resources\FifteenMillionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAchiever extends CreateRecord
{
    protected static string $resource = FifteenMillionResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 2;
        return $data;
    }
}
