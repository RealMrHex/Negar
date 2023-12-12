<?php

namespace Modules\Course\Entities\V1\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;

class Course extends BaseModel
{
    use HasFactory,
        CourseModifiers,
        CourseRelations,
        CourseScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        #CourseFields::ID,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        #CourseFields::CREATED_AT => 'datetime',
    ];
}
