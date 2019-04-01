<?php

namespace Rockbuzz\LaraMaintenance;

use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class ServiceProvider extends SupportServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/maintenance.php' => config_path('maintenance.php')
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/maintenance.php', 'maintenance');
    }
}
