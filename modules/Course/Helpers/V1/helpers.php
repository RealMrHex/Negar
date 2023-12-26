<?php

use Modules\Course\Contracts\V1\CourseRepository\CourseRepository;
use Modules\Course\Contracts\V1\CourseUserRepository\CourseUserRepository;

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

if (!function_exists('v1_course_user'))
{
    /**
     * Get the course repo
     *
     * @return CourseUserRepository
     */
    function v1_course_user(): CourseUserRepository
    {
        return resolve(CourseUserRepository::class);
    }
}
