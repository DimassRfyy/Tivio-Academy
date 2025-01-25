<?php

namespace App\Repositories;

use App\Models\CourseTestimonial;
use Illuminate\Support\Collection;

interface CourseRepositoryInterface
{
  public function searchByKeyword(string $keyword): Collection;

  public function getAllWithCategory(): Collection;

  public function createTestimonial(array $data): CourseTestimonial;
}