<?php

use Modules\Season\Contracts\V1\SeasonRepository\SeasonRepository;

if (!function_exists('v1_season'))
{
    /**
     * Get the season repo
     *
     * @return SeasonRepository
     */
    function v1_season(): SeasonRepository
    {
        return resolve(SeasonRepository::class);
    }
}
