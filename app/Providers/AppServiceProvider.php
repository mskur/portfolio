<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use App\Models\Profile;
use App\Models\SocialLink;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Bagikan data ke layout utama dan partials (navbar/footer)
        View::composer(['layouts.frontend', 'layouts.partials.*'], function ($view) {
            $view->with('settings', SiteSetting::first());
            $view->with('profile', Profile::first());
            $view->with('socials', SocialLink::orderBy('sort_order')->get());
        });
    }
}