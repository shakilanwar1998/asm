<?php

namespace App\Filament\Resources\HeadingResource\Pages;

use App\Filament\Resources\HeadingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeading extends CreateRecord
{
    protected static string $resource = HeadingResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 1;
        return $data;
    }
}
