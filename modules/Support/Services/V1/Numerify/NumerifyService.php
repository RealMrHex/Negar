<?php

namespace Modules\Support\Services\V1\Numerify;

use Modules\Support\Contracts\V1\Numerify\Numerify;
use Throwable;

class NumerifyService implements Numerify
{
    /**
     * Convert number to word
     *
     * @param mixed $number
     *
     * @return ?string
     */
    public function convert(mixed $number): ?string
    {
        try
        {
            if (!is_integer($number))
                return $number;

            return __("v1.support::service.numerify.$number");
        }
        catch (Throwable $exception)
        {
            report($exception);
            return $number;
        }
    }
}
