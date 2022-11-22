<?php

namespace App\Providers;

use App\Answer\Domain\Repositories\CheckUserAnswerRepositortyInterface;


use App\Question\Domain\Repositories\CheckUserQuestionRepository;
use App\Question\Domain\Repositories\CheckUserQuestionRepositoryInterface;
use App\Question\Domain\Repositories\CreateQuestionRepository;
use App\Question\Domain\Repositories\CreateQuestionRepositoryInterface;
use App\Question\Domain\Repositories\DeleteQuestionRepository;
use App\Question\Domain\Repositories\DeleteQuestionRepositoryInterface;

use App\Question\Domain\Repositories\SearchQuestionToTitleRepository;
use App\Question\Domain\Repositories\SearchQuestionRepositoryInterface;
use App\Question\Domain\Repositories\SearchQuestionUserInterface;
use App\Question\Domain\Repositories\SearchQuestionUserRepository;
use App\Question\Domain\Repositories\UpdateQuestionRepository;

use App\Question\Domain\Repositories\UpdateQuestionRepositoryInterface;
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
        $this->app->bind(CheckUserQuestionRepositoryInterface::class,CheckUserQuestionRepository::class);
        $this->app->bind(CreateQuestionRepositoryInterface::class,CreateQuestionRepository::class);
        $this->app->bind(DeleteQuestionRepositoryInterface::class,DeleteQuestionRepository::class);
        $this->app->bind(UpdateQuestionRepositoryInterface::class,UpdateQuestionRepository::class);
        $this->app->bind(SearchQuestionRepositoryInterface::class,SearchQuestionToTitleRepository::class);
        $this->app->bind(SearchQuestionUserInterface::class,SearchQuestionUserRepository::class);
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
