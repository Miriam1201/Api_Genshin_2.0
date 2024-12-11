<?php

namespace App\Filament\Genshin\Resources\WeaponResource\Pages;

use App\Filament\Genshin\Resources\WeaponResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditWeapon extends EditRecord
{
    protected static string $resource = WeaponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $id = $this->record->id;

        // Define la carpeta destino
        $destinationPath = "images/weapons/{$id}";

        // Mueve las imágenes cargadas temporalmente a la carpeta correcta
        if (!empty($data['image']) && $data['image'] !== $this->record->icon_big) {
            $filename = 'icon.png';
            Storage::disk('public')->move($data['image'], "{$destinationPath}/{$filename}");
            $data['image'] = "/{$destinationPath}/{$filename}";
        }

        return $data;
    }
}