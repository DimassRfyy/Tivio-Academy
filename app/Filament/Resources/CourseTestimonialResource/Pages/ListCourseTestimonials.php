<?php

namespace App\Filament\Resources\CourseTestimonialResource\Pages;

use App\Filament\Resources\CourseTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourseTestimonials extends ListRecords
{
    protected static string $resource = CourseTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
