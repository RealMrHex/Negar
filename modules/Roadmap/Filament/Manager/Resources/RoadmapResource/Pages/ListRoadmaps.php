<?php

namespace Modules\Roadmap\Filament\Manager\Resources\RoadmapResource\Pages;

use Modules\Roadmap\Filament\Manager\Resources\RoadmapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRoadmaps extends ListRecords
{
    protected static string $resource = RoadmapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
