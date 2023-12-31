<?php

namespace Modules\Roadmap\Filament\Manager\Resources;

use Modules\Support\Filament\Resources\ProResource\ProResource;

class RoadmapResource extends ProResource
{
    /**
     * Get the model
     *
     * @return string
     */
    public static function getModel(): string
    {
        return v1_roadmap()->model();
    }
}
