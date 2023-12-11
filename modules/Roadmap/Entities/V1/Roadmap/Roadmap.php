<?php

namespace Modules\Roadmap\Entities\V1\Roadmap;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Base\Entities\V1\BaseModel;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        #RoadmapFields::CREATED_AT => 'datetime',
    ];
}
