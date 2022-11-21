<?php

namespace App\Providers;

use App\Question\Domain\Repositories\CheckUserQuestionRepositortyInterface;
use App\Question\Domain\Repositories\CheckUserQuestionRepository;
use App\Question\Domain\Repositories\CreateQuestionRepository;
use App\Question\Domain\Repositories\CreateQuestionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class QuestionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(CheckUserQuestionRepositortyInterface::class,CheckUserQuestionRepository::class);
        $this->app->bind(CreateQuestionRepositoryInterface::class,CreateQuestionRepository::class);
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
