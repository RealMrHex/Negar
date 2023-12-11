<?php

use Modules\Roadmap\Contracts\V1\RoadmapRepository\RoadmapRepository;

if (!function_exists('v1_roadmap'))
{
    /**
     * Get the Roadmap repository
     *
     * @return RoadmapRepository
     */
    function v1_roadmap(): RoadmapRepository
    {
        return resolve(RoadmapRepository::class);
    }
}
