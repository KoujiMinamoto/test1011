<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Dingo\Api\Auth\Auth;
// use Dingo\Api\Auth\Provider\JWT;
// use Tymon\JWTAuth\JWTAuth;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //jwt
        // $this->app->make(Auth::class)->extend('jwt', function ($app) {
        //     return new JWT($app[JWTAuth::class]);
        // });
        //
    }
}
