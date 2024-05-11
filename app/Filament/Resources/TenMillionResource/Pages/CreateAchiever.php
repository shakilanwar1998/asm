<?php

namespace App\Filament\Resources\TenMillionResource\Pages;

use App\Filament\Resources\TenMillionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAchiever extends CreateRecord
{
    protected static string $resource = TenMillionResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 1;
        return $data;
    }
}
