<?php

use Modules\Course\Contracts\V1\CourseRepository\CourseRepository;

if (!function_exists('v1_course'))
{
    /**
     * Get the course repo
     *
     * @return CourseRepository
     */
    function v1_course(): CourseRepository
    {
        return resolve(CourseRepository::class);
    }
}
