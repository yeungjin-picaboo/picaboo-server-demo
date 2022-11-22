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
use App\Answer\Domain\Repositories\DeleteAnswerRepository;
use App\Answer\Domain\Repositories\DeleteAnswerRepositoryInterface;
use App\Answer\Domain\Repositories\UpdateAnswerRepository;
use App\Answer\Domain\Repositories\UpdateAnswerRepositoryInterface;
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
        $this->app->bind(DeleteAnswerRepositoryInterface::class,DeleteAnswerRepository::class);
        $this->app->bind(UpdateAnswerRepositoryInterface::class,UpdateAnswerRepository::class);
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
