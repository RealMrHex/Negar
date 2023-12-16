<?php

namespace Modules\Category\Filament\Manager\Resources;

use Modules\Support\Filament\Resources\ProResource\ProResource;

class CategoryResource extends ProResource
{
    /**
     * Get the model
     *
     * @return string
     */
    public static function getModel(): string
    {
        return v1_category()->model();
    }
}
