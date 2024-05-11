<?php

namespace App\Filament\Resources\LogoResource\Pages;

use App\Filament\Resources\LogoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLogo extends CreateRecord
{
    protected static string $resource = LogoResource::class;
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 2;
        return $data;
    }
}
