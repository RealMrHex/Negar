<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfileFields;

trait UserModifiers
{
    /**
     * Get the user's name
     *
     * @return Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->{UserFields::REL_PROFILE}->{UserProfileFields::FULL_NAME} ?? __('Unknown User')
        );
    }
}
