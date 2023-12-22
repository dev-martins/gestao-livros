<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AuthRepositoryInterface::class,
            AuthRepository::class
        );
        $this->app->bind(
            AuthServiceInterface::class,
            AuthService::class
        );
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
