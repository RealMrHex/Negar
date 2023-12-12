<?php

namespace Modules\Course\Repositories\V1\CourseRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Course\Contracts\V1\CourseRepository\CourseRepository;
use Modules\Course\Entities\V1\Course\Course;

class CourseEloquentRepository extends BaseRepository implements CourseRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Course::class;
    }
}
