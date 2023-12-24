<?php

namespace Modules\Support\Contracts\V1\Numerify;

interface Numerify
{
    /**
     * Convert number to word
     *
     * @param mixed $number
     *
     * @return ?string
     */
    public function convert(mixed $number): ?string;
}
