<?php

namespace App\Filament\Resources\AnggotaTimResource\Pages;

use App\Filament\Resources\AnggotaTimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnggotaTims extends ListRecords
{
    protected static string $resource = AnggotaTimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
