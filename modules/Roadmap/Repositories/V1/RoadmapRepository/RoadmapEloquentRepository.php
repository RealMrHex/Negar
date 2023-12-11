<?php

namespace Modules\Roadmap\Repositories\V1\RoadmapRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Roadmap\Contracts\V1\RoadmapRepository\RoadmapRepository;
use Modules\Roadmap\Entities\V1\Roadmap\Roadmap;

class RoadmapEloquentRepository extends BaseRepository implements RoadmapRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Roadmap::class;
    }
}
