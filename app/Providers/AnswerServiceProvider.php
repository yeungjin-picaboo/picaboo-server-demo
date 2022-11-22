<?php

namespace App\Providers;

use App\Answer\Domain\Repositories\CheckQuestionNumRepository;
use App\Answer\Domain\Repositories\CheckQuestionNumRepositoryInterface;
use App\Answer\Domain\Repositories\CheckUserAnswerRepositortyInterface;
use App\Answer\Domain\Repositories\CheckUserAnswerRepository;
use App\Answer\Domain\Repositories\CheckUserPermissionRepository;
use App\Answer\Domain\Repositories\CheckUserPermissionRepositoryInterface;
use App\Answer\Domain\Repositories\CreateAnswerRepository;
use App\Answer\Domain\Repositories\CreateAnswerRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AnswerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CheckQuestionNumRepositoryInterface::class,CheckQuestionNumRepository::class);
        $this->app->bind(CheckUserPermissionRepositoryInterface::class,CheckUserPermissionRepository::class);
        $this->app->bind(CheckUserAnswerRepositortyInterface::class,CheckUserAnswerRepository::class);
        $this->app->bind(CreateAnswerRepositoryInterface::class,CreateAnswerRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
