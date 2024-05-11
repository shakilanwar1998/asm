<?php

namespace App\Filament\Resources\TenMillionResource\Pages;

use App\Filament\Resources\TenMillionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAchievers extends ListRecords
{
    protected static string $resource = TenMillionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
