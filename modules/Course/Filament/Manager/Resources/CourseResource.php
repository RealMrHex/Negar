<?php

namespace Modules\Course\Filament\Manager\Resources;

use Modules\Support\Filament\Resources\ProResource\ProResource;

class CourseResource extends ProResource
{
    /**
     * Get the model
     *
     * @return string
     */
    public static function getModel(): string
    {
        return v1_course()->model();
    }
}
