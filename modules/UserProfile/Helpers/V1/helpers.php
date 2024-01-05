<?php

use Modules\UserProfile\Contracts\V1\UserProfileRepository\UserProfileRepository;

if (!function_exists('v1_user_profile'))
{
    /**
     * Get the user profile repo.
     *
     * @return UserProfileRepository
     */
    function v1_user_profile(): UserProfileRepository
    {
        return resolve(UserProfileRepository::class);
    }
}
