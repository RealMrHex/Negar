<?php

namespace Modules\UserProfile\Repositories\V1\UserProfileRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\UserProfile\Contracts\V1\UserProfileRepository\UserProfileRepository;
use Modules\UserProfile\Entities\V1\UserProfile\UserProfile;

class UserProfileEloquentRepository extends BaseRepository implements UserProfileRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return UserProfile::class;
    }
}
