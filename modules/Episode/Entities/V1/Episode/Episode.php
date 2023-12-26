<?php

namespace Modules\Episode\Entities\V1\Episode;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Episode\Database\Factories\V1\EpisodeFactory\EpisodeFactory;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

class Episode extends BaseModel
{
    use HasFactory,
        EpisodeModifiers,
        EpisodeRelations,
        EpisodeScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        EpisodeFields::ID,
        EpisodeFields::TEACHER_ID,
        EpisodeFields::SEASON_ID,
        EpisodeFields::WEIGHT,
        EpisodeFields::ATTACHMENT,
        EpisodeFields::TITLE,
        EpisodeFields::DESCRIPTION,
        EpisodeFields::DURATION,
        EpisodeFields::VIDEO_CONFIG,
        EpisodeFields::PUBLISHED_AT,
        EpisodeFields::SUBSCRIPTION_ACCESSED_AT,
        EpisodeFields::PAID_ACCESSED_AT,
        EpisodeFields::INSTALLMENT_ACCESSED_AT,
        EpisodeFields::FREE_ACCESS,
        EpisodeFields::IS_ACCESSIBLE,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        EpisodeFields::VIDEO_CONFIG  => 'array',
        EpisodeFields::FREE_ACCESS   => ToggleStatus::class,
        EpisodeFields::IS_ACCESSIBLE => ToggleStatus::class,
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
        return EpisodeFactory::new();
    }
}
