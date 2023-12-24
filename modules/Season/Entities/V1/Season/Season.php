<?php

namespace Modules\Season\Entities\V1\Season;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Season\Database\Factories\V1\SeasonFactory\SeasonFactory;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

class Season extends BaseModel
{
    use HasFactory,
        SeasonModifiers,
        SeasonRelations,
        SeasonScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        SeasonFields::ID,
        SeasonFields::COURSE_ID,
        SeasonFields::TITLE,
        SeasonFields::WEIGHT,
        SeasonFields::STATUS,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        SeasonFields::STATUS => ToggleStatus::class,
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
        return SeasonFactory::new();
    }
}
