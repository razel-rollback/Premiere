<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SectionAssignmentService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(SectionAssignmentService::class, function () {
            return new SectionAssignmentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
