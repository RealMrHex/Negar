<?php

namespace Modules\Support\Enums\V1\Entities;

use Illuminate\Support\Str;

enum Entities: string
{
    case User       = 'user';
    case Roadmap    = 'roadmap';
    case Role       = 'role';
    case Permission = 'permission';
    #region Logic

    /**
     * Get the singular form
     *
     * @return string
     */
    public function singular(): string
    {
        return Str::of($this->value)->snake()->toString();
    }

    /**
     * Get the plural form
     *
     * @return string
     */
    public function plural(): string
    {
        return Str::of($this->value)->plural()->toString();
    }

    /**
     * Get the pivot form
     *
     * @return string
     */
    public function pivot(): string
    {
        return $this->singular();
    }

    /**
     * Get the table name
     *
     * @return string
     */
    public function table(): string
    {
        return Str::of($this->plural())->snake()->toString();
    }

    /**
     * Get the foreign key
     *
     * @return string
     */
    public function foreign(): string
    {
        return Str::of($this->value)->snake()->append('_id')->toString();
    }
    #endregion
}
