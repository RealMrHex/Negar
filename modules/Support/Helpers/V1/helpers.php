<?php

use Modules\Support\Contracts\V1\Numerify\Numerify;

if (!function_exists('disk'))
{
    /**
     * Get the default disk name
     *
     * @return string
     */
    function disk(): string
    {
        return config('filesystems.default');
    }
}

if (!function_exists('v1_numerify'))
{
    /**
     * Resolve the numerify service
     *
     * @return Numerify
     */
    function v1_numerify(): Numerify
    {
        return resolve(Numerify::class);
    }
}
