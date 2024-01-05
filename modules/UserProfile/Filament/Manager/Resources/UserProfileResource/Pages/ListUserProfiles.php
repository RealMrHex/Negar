<?php

namespace Modules\UserProfile\Filament\Manager\Resources\UserProfileResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\UserProfile\Filament\Manager\Resources\UserProfileResource;

class ListUserProfiles extends ListRecords
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
            CreateAction::make(),
        ];
    }
}
