<?php

namespace Modules\Course\Entities\V1\Course;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CourseRelations
{
    /**
     * Get the course category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(v1_category()->model(), CourseFields::PRIMARY_CATEGORY_ID);
    }

    /**
     * Get the course teacher
     *
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(v1_category()->model(), CourseFields::PRIMARY_TEACHER_ID);
    }
}
