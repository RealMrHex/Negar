<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait UserModifiers
{
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn() => __('Unknown User')
        );
    }
}
