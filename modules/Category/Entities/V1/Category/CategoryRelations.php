<?php

namespace Modules\Category\Entities\V1\Category;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait CategoryRelations
{
    /**
     * Get the parent category
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(v1_category()->model(), CategoryFields::PARENT_ID);
    }

    /**
     * Get the children categories
     *
     * @return BelongsTo
     */
    public function children(): BelongsTo
    {
        return $this->hasMany(v1_category()->model(), CategoryFields::PARENT_ID);
    }

    /**
     * Get the category's courses
     *
     * @return HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(v1_course()->model());
    }
}
