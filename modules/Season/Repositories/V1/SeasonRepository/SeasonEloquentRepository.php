<?php

namespace Modules\Season\Repositories\V1\SeasonRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Season\Contracts\V1\SeasonRepository\SeasonRepository;
use Modules\Season\Entities\V1\Season\Season;

class SeasonEloquentRepository extends BaseRepository implements SeasonRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Season::class;
    }
}
