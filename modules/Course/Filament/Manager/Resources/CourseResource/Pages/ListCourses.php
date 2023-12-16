<?php

namespace Modules\Course\Filament\Manager\Resources\CourseResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Course\Filament\Manager\Resources\CourseResource;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    /**
     * Get header actions
     *
     * @return array
     */
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
