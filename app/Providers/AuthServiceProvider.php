<?php

namespace App\Providers;

use Auth;
use Illuminate\Hashing\BcryptHasher;
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

        Auth::provider('kis', function ($app, array $config) {
            return new KisUserProvider($this->app['hash'], config('auth.providers.users.model'));
        });
    }
}
