<?php

namespace App\Providers;

use App\Comment\Domain\Repositories\CheckUserRepository;
use App\Comment\Domain\Repositories\CheckUserRepositoryInterface;
use App\Comment\Domain\Repositories\CreateCommentRepository;
use App\Comment\Domain\Repositories\CreateCommentRepositoryInterface;
use App\Comment\Domain\Repositories\DeleteCommentRepository;
use App\Comment\Domain\Repositories\DeleteCommentRepositoryInterface;
use App\Comment\Domain\Repositories\ShowAllCommentRepository;
use App\Comment\Domain\Repositories\ShowAllCommentRepositoryInterface;
use App\Comment\Domain\Repositories\UpdateCommentRepository;
use App\Comment\Domain\Repositories\UpdateCommentRepositoryInterface;
use App\Common\Responders\DeleteRepositoryInterface;
use App\Community\Domain\Repositories\UpdateCommunityRepository;
use App\Community\Domain\Repositories\UpdateCommunityRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CommentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateCommentRepositoryInterface::class,CreateCommentRepository::class);
        $this->app->bind(DeleteRepositoryInterface::class,DeleteCommentRepository::class);
        $this->app->bind(ShowAllCommentRepositoryInterface::class,ShowAllCommentRepository::class);
        $this->app->bind(UpdateCommunityRepositoryInterface::class,UpdateCommunityRepository::class);
        $this->app->bind(CheckUserRepositoryInterface::class,CheckUserRepository::class);
        $this->app->bind(UpdateCommentRepositoryInterface::class,UpdateCommentRepository::class);

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
