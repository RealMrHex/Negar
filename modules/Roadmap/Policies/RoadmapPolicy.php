<?php

namespace Modules\Roadmap\Policies;

use Modules\Base\Policies\V1\CleanPolicy\CleanPolicy;

class RoadmapPolicy extends CleanPolicy
{
    /**
     * Get the unique key
     *
     * @return string
     */
    protected function key(): string
    {
        return 'v1_roadmap';
    }
}
