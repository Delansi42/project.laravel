<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Package1\UserAgentInterface;
use Package2\UserAgentParser;
use Package3\UserAgentParserCnwyt;

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
            //return new UserAgentParser();
            return new UserAgentParserCnwyt();
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
