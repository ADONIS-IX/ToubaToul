<?php

namespace App\Providers;

use App\Models\Parcelle;
use App\Observers\ParcelleObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Parcelle::observe(ParcelleObserver::class);

        Blade::directive('datetime', function (string $expression) {
            return "<?= ($expression)->format('d/m/Y H:i:s'); ?>";
        });
    }
}
