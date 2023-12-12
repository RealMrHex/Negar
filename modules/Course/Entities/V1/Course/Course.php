<?php

namespace Modules\Course\Entities\V1\Course;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Course\Database\Factories\V1\CourseFactory\CourseFactory;

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

    /**
     * Get a new factory instance for the model.
     *
     * @param callable|array|int|null $count
     * @param callable|array          $state
     *
     * @return Factory<static>
     */
    public static function factory($count = null, $state = []): Factory
    {
        return CourseFactory::new();
    }
}
