<?php

namespace App\Filament\Resources\TenMillionResource\Pages;

use App\Filament\Resources\TenMillionResource;
use App\Models\Member;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAchiever extends EditRecord
{
    protected static string $resource = TenMillionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
