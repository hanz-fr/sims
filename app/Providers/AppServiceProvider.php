<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('tata usaha', fn(User $user) => $user->role === 1);
        Gate::define('kesiswaan', fn(User $user) => $user->role === 2);
        Gate::define('kurikulum', fn(User $user) => $user->role === 3);
        Gate::define('wali kelas', fn(User $user) => $user->role === 4); 
    }
}
