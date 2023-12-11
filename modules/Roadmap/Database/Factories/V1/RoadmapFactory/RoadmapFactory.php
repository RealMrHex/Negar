<?php

namespace Modules\Roadmap\Database\Factories\V1\RoadmapFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class RoadmapFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_roadmap()->model();
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
