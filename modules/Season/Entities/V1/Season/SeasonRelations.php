<?php

namespace Modules\Season\Entities\V1\Season;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait SeasonRelations
{
    /**
     * Get the related course
     *
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(v1_course()->model());
    }

    /**
     * Get the related episodes
     *
     * @return HasMany
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(v1_episode()->model());
    }
}
