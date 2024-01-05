<?php

namespace Modules\UserProfile\Database\Factories\V1\UserProfileFactory;

use Modules\Base\Database\Factory\V1\BaseFactory\BaseFactory;

class UserProfileFactory extends BaseFactory
{
    /**
     * Get the target model
     */
    public function model(): string
    {
        return v1_user_profile()->model();
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
