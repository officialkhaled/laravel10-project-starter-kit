<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Carbon::macro('greetings', function () {
            $hour = date('H');
            if ($hour < 12) {
                return "Good Morning, ";
            }
            if ($hour < 17) {
                return "Good Afternoon, ";
            }
            return "Good Evening, ";
        });
    }

    public function boot(): void
    {
        //
    }
}
