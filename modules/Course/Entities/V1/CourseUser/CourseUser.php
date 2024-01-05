<?php

namespace Modules\Course\Entities\V1\CourseUser;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\Course\Enums\V1\CourseUserRole\CourseUserRole;

class CourseUser extends Pivot
{
    use CourseUserModifiers,
        CourseUserRelations,
        CourseUserScopes;


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        CourseUserFields::ROLE => CourseUserRole::class,
    ];

    /**
     * Get the related user
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(v1_user()->model());
    }

    /**
     * Get the related course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(v1_course()->model());
    }
}
