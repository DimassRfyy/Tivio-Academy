<?php

namespace App\Repositories;

use App\Models\Pricing;
use Illuminate\Support\Collection;

interface PricingRepositoryInterface
{
  public function findById(int $id): ?Pricing;

  public function getAll(): Collection;

  public function getAllTestimonials(): Collection;
}