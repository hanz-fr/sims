<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('kesiswaan', fn (User $user) => $user->role == 2 );
        Gate::define('wali-kelas', fn (User $user) => $user->role == 4 );
        Gate::define('admin-only', fn (User $user) => $user->is_admin == 1 );

        Gate::define('manage-induk', function (User $user) {

            if ($user->role == 1) {
                return true;
            }

            if ($user->is_admin == 1) {
                return true;
            }

            return false;
        });
        
        Gate::define('manage-alumni', function (User $user) {

            if ($user->role == 1) {
                return true;
            }

            if ($user->role == 2) {
                return true;
            }

            if ($user->is_admin == 1) {
                return true;
            }

            return false;
        });

        Gate::define('manage-mutasi', function (User $user) {

            if ($user->role == 2) {
                return true;
            }

            if ($user->is_admin == 1) {
                return true;
            }

            return false;
        });

        Gate::define('manage-nilai', function (User $user) {

            if ($user->role == 4) {
                return true;
            }

            if ($user->is_admin == 1) {
                return true;
            }

            return false;
        });

        Gate::define('update-nilai', function (User $user) {

            if ($user->role == 1) {
                return true;
            }

            if ($user->role == 4) {
                return true;
            }

            if ($user->is_admin == 1) {
                return true;
            }

            return false;
        });
    }
}
