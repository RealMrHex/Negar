<?php

namespace Modules\Course\Entities\V1\CourseUser;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CourseUserRelations
{
    /**
     * Get the related course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(v1_course()->model());
    }

    /**
     * Get the related user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(v1_user()->model());
    }
}
