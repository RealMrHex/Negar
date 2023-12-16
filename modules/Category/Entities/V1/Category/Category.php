<?php

namespace Modules\Category\Entities\V1\Category;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;
use Modules\Category\Database\Factories\V1\CategoryFactory\CategoryFactory;
use Modules\Support\Enums\V1\ToggleStatus\ToggleStatus;

class Category extends BaseModel
{
    use HasFactory,
        CategoryModifiers,
        CategoryRelations,
        CategoryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        CategoryFields::ID,
        CategoryFields::PARENT_ID,
        CategoryFields::SLUG,
        CategoryFields::TITLE,
        CategoryFields::COVER,
        CategoryFields::SOCIAL_PREVIEW,
        CategoryFields::DESCRIPTION,
        CategoryFields::CONTENT,
        CategoryFields::STATUS,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        CategoryFields::STATUS => ToggleStatus::class,
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
        return CategoryFactory::new();
    }
}
