<?php

namespace Modules\Course\Repositories\V1\CourseUserRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Course\Contracts\V1\CourseUserRepository\CourseUserRepository;
use Modules\Course\Entities\V1\CourseUser\CourseUser;

class CourseUserEloquentRepository extends BaseRepository implements CourseUserRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return CourseUser::class;
    }
}
