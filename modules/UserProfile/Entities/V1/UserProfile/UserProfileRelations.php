<?php

namespace Modules\UserProfile\Entities\V1\UserProfile;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait UserProfileRelations
{
    /**
     * Get the related user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(v1_user()->model());
    }
}
