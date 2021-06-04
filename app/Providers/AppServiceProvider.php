<?php

namespace App\Providers;

use App\Setting;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        Builder::defaultStringLength(191);
        
    }
}
