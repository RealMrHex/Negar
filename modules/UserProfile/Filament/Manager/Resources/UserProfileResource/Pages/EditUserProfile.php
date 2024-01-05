<?php

namespace Modules\UserProfile\Filament\Manager\Resources\UserProfileResource\Pages;

use Filament\Resources\Pages\EditRecord;
use Filament\Actions\DeleteAction;
use Modules\UserProfile\Filament\Manager\Resources\UserProfileResource;

class EditUserProfile extends EditRecord
{
    protected static string $resource = UserProfileResource::class;

    /**
     * Get header actions
     *
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
