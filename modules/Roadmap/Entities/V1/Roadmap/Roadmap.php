<?php

namespace Modules\Roadmap\Entities\V1\Roadmap;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Roadmap\Database\Factories\V1\RoadmapFactory\RoadmapFactory;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

class Roadmap extends BaseModel
{
    use HasFactory,
        RoadmapModifiers,
        RoadmapRelations,
        RoadmapScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        RoadmapFields::ID,
        RoadmapFields::SLUG,
        RoadmapFields::WEIGHT,
        RoadmapFields::LOGO,
        RoadmapFields::THUMBNAIL,
        RoadmapFields::DEMO,
        RoadmapFields::TITLE,
        RoadmapFields::DESCRIPTION,
        RoadmapFields::STATUS,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        RoadmapFields::WEIGHT => 'integer',
        RoadmapFields::STATUS => ToggleStatus::class,
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
        return RoadmapFactory::new();
    }
}
