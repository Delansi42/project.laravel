<?php

namespace App\Providers;

use App\Services\UserAgent\UserAgentParserCnwyt;
use App\Services\UserAgent\UserAgentInterface;
use App\Services\UserAgent\UserAgentParser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserAgentInterface::class, function () {
            return new UserAgentParser();
            //return new UserAgentParserCnwyt();
        });
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
