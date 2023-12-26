<?php

use Modules\Episode\Contracts\V1\EpisodeRepository\EpisodeRepository;

if (!function_exists('v1_episode'))
{
    /**
     * Get the episode repo
     *
     * @return EpisodeRepository
     */
    function v1_episode(): EpisodeRepository
    {
        return resolve(EpisodeRepository::class);
    }
}
