<?php

namespace App\Providers;

use App\Models\Mahasiswa;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        Paginator::useBootstrapFive();
        View::composer(['mahasiswa.*', 'user.*'], function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $pemagang = Mahasiswa::where('user_id', $user->id)->first();
                $view->with('pemagang', $pemagang);
            }
        });

    }
}