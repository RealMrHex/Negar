<?php

namespace Modules\Course\Entities\V1\Course;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsTo(v1_user()->model(), CourseFields::PRIMARY_TEACHER_ID);
    }

    /**
     * Get the course seasons
     *
     * @return HasMany
     */
    public function seasons(): HasMany
    {
        return $this->hasMany(v1_season()->model());
    }
}
