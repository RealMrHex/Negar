<?php

namespace Modules\User\Enums\V1\AccountType;

use Illuminate\Support\Collection;
use Modules\Support\Traits\V1\CleanEnum\CleanEnum;

enum AccountType: int
{
    use CleanEnum;

    case System  = 0;
    case Sudo    = 1;
    case Manager = 2;
    case Teacher = 3;
    case Parent  = 4;
    case Student = 5;

    /**
     * Get safe pairs to create
     */
    public static function createablePairs(): Collection
    {
        return collect(self::cases())
            ->reject(fn($case) => $case->classified())
            ->mapWithKeys(fn($case) => [$case->value => $case->trans()])
        ;
    }

    /**
     * Get classified cases
     *
     * @return bool
     */
    public function classified(): bool
    {
        return in_array($this, [self::System, self::Sudo]);
    }

    /**
     * Get not-classified cases
     *
     * @return bool
     */
    public function notClassified(): bool
    {
        return !$this->classified();
    }
}
