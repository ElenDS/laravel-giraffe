<?php

declare(strict_types=1);

namespace App\Providers;

use App\Jobs\SendEmailJob;
use App\Repositories\AdRepository;
use App\Repositories\Interfaces\AdRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class SendEmailServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bindMethod([SendEmailJob::class, 'handle'], function (SendEmailJob $job) {
            $job->handle();
        });
    }
}
