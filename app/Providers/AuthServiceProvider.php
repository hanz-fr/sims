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

        Gate::define('tata usaha', fn(User $user) => $user->role === 1);
        Gate::define('kesiswaan', fn(User $user) => $user->role === 2);
        Gate::define('kurikulum', fn(User $user) => $user->role === 3);
        Gate::define('wali kelas', fn(User $user) => $user->role === 4); 

        Gate::define('rekap-siswa', function($user){
            return in_array($user->role, [1, 2]);
        });

        Gate::define('rekap-nilai', function($user){
            return in_array($user->role, [1, 4]);
        });
    }
}
