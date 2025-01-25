<?php

namespace App\Filament\Resources\CourseTestimonialResource\Pages;

use App\Filament\Resources\CourseTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseTestimonial extends EditRecord
{
    protected static string $resource = CourseTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
