<?php

namespace Modules\Course\Entities\V1\Course;

use Illuminate\Database\Eloquent\Relations\HasMany;

trait CourseRelations
{
    /**
     * Get the course users
     *
     * @return HasMany
     */
    public function courseUsers(): HasMany
    {
        return $this->hasMany(v1_course_user()->model());
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
