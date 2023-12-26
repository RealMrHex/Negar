<?php

namespace Modules\Course\Database\Factories\V1\CourseUserFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class CourseUserFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_course_user()->model();
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [];
    }
}
