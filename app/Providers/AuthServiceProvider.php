<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerEkinerjaPolicies();

        //
    }

    public function registerEkinerjaPolicies(){
        
        Gate::define('master-data', function($user){
            return $user->hasAccess(['master-data']);
        });
        Gate::define('monitoring-absen', function($user){
            return $user->hasAccess(['monitoring-absen']);
        });
        Gate::define('rekap-bulanan', function($user){
            return $user->hasAccess(['rekap-bulanan']);
        });
        Gate::define('input-kinerja', function($user){
            return $user->hasAccess(['input-kinerja']);
        });
        Gate::define('penilaian-kinerja', function($user){
            return $user->hasAccess(['penilaian-kinerja']);
        });
        Gate::define('penilaian-etika', function($user){
            return $user->hasAccess(['penilaian-etika']);
        });
        Gate::define('tunjangan-kinerja', function($user){
            return $user->hasAccess(['tunjangan-kinerja']);
        });

    }
}
