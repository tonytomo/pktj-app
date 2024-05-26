<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\NavigationBar;
use App\View\Components\Footer;
use App\View\Components\Alert;
use App\View\Components\LoginForm;
use App\View\Components\RegisterForm;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('navbar', NavigationBar::class);
        Blade::component('footer', Footer::class);
        Blade::component('alert', Alert::class);
        Blade::component('login-form', LoginForm::class);
        Blade::component('register-form', RegisterForm::class);
    }
}
