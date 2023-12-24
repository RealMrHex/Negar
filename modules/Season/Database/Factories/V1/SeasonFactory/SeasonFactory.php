<?php

namespace Modules\Season\Database\Factories\V1\SeasonFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class SeasonFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_season()->model();
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
