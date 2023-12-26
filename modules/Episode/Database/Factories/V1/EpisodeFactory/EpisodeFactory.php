<?php

namespace Modules\Episode\Database\Factories\V1\EpisodeFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class EpisodeFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_episode()->model();
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
