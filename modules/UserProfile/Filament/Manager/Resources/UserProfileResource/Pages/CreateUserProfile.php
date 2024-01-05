<?php

namespace Modules\UserProfile\Filament\Manager\Resources\UserProfileResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\UserProfile\Filament\Manager\Resources\UserProfileResource;

class CreateUserProfile extends CreateRecord
{
    protected static string $resource = UserProfileResource::class;
}
