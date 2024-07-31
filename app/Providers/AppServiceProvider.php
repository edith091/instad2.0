<?php

namespace App\Providers;
use App\Observers\DemandeObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Demande;

class AppServiceProvider extends ServiceProvider
{
  
  
  
    public function boot()
    {
        Demande::observe(DemandeObserver::class);
    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

}
