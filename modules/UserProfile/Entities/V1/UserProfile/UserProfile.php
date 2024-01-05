<?php

namespace Modules\UserProfile\Entities\V1\UserProfile;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\UserProfile\Database\Factories\V1\UserProfileFactory\UserProfileFactory;
use Modules\UserProfile\Enums\V1\Gender\Gender;

class UserProfile extends BaseModel
{
    use HasFactory,
        UserProfileModifiers,
        UserProfileRelations,
        UserProfileScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        UserProfileFields::AVATAR,
        UserProfileFields::FIRST_NAME,
        UserProfileFields::LAST_NAME,
        UserProfileFields::BIRTH_DATE,
        UserProfileFields::GENDER,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        UserProfileFields::GENDER => Gender::class,
    ];

    /**
     * Get a new factory instance for the model.
     *
     * @param callable|array|int|null $count
     * @param callable|array          $state
     *
     * @return Factory<static>
     */
    public static function factory($count = null, $state = []): Factory
    {
        return UserProfileFactory::new();
    }
}
