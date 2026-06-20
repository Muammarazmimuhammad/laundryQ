<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- 1. WAJIB TAMBAH INI DI ATAS

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
        // 2. TAMBAHKAN KODE INI BIAR CSS TAILWIND GAK DIBLOKIR BROWSER
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}