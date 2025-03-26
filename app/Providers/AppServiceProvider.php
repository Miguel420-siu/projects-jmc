<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TareaService;
use App\Contracts\TareaInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TareaInterface::class, TareaService::class);

        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
