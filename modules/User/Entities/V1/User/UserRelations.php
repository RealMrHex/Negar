<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Relations\HasOne;

trait UserRelations
{
    /**
     * Get the user's profile
     *
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(v1_user_profile()->model());
    }
}
