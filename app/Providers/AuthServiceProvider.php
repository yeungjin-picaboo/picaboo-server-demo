<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     * 인증관련
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // passport 라우터 -> 액세스 토큰 발급, 해제 auth service provider
        Passport::ignoreRoutes(); //ver11.* routes -> ignoreRoutes

//       Passport::tokensExpireIn(now()->addDays(15));
        Passport::tokensExpireIn(now()->addDays(1));  // token refresh
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
