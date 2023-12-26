<?php

namespace Modules\Episode\Repositories\V1\EpisodeRepository;

use Modules\Base\Repositories\V1\BaseRepository\BaseRepository;
use Modules\Episode\Contracts\V1\EpisodeRepository\EpisodeRepository;
use Modules\Episode\Entities\V1\Episode\Episode;

class EpisodeEloquentRepository extends BaseRepository implements EpisodeRepository
{
    /**
     * Specify Model class name
     */
    public function model(): string
    {
        return Episode::class;
    }
}
