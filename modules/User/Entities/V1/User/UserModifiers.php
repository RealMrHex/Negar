<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Casts\Attribute;

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
            get: fn() => __('Unknown User')
        );
    }
}
