<?php

namespace App\Providers;

use App\Models\Transaction;
use App\Observers\TransactionObserver;
use App\Repositories\CourseRepository;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\PricingRepository;
use App\Repositories\PricingRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Repositories\TransactionRepositoryInterface;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(PricingRepositoryInterface::class, PricingRepository::class);
        $this->app->singleton(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->singleton(CourseRepositoryInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Transaction::observe(TransactionObserver::class);

        // Ubah FORCE_HTTPS di env jika uji coba di local menggunakan ngrok ubah ke true jika tidak maka false
        // kode ini digunakan untuk menangani css & asset yang rusak saat uji coba menggunakan ngrok
        if (env('FORCE_HTTPS', false)) {
             URL::forceScheme('https');
        }
    }
}
