<?php

namespace Modules\Season\Entities\V1\Season;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
