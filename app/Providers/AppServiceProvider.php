<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Student\StudentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
