<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\AdRepository;
use App\Repositories\Interfaces\AdRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AdServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AdRepositoryInterface::class, AdRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
