<?php

namespace Modules\UserProfile\Filament\Manager\Resources;

use Modules\Support\Filament\Resources\ProResource\ProResource;

class UserProfileResource extends ProResource
{
    /**
     * Get the model
     *
     * @return string
     */
    public static function getModel(): string
    {
        return v1_user_profile()->model();
    }
}
