<?php

namespace Modules\Category\Database\Factories\V1\CategoryFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class CategoryFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_category()->model();
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
