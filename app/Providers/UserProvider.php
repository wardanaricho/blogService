<?php

namespace App\Providers;

use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImpl;
use App\Services\User\UserService;
use App\Services\User\UserServiceImpl;
use Illuminate\Support\ServiceProvider;

class UserProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
