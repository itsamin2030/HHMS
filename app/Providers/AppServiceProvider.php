<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Twilio\TwilioService;
use App\Services\Twilio\Verification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TwilioService::class, function ($app) {
            return new TwilioService();
        });
        $this->app->bind(
            'App\Verify\Service',
            'App\Services\Twilio\Verification'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
