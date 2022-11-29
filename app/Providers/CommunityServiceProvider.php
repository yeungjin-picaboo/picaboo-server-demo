<?php

namespace App\Providers;

use App\Community\Actions\DeleteCommunityAction;
use App\Community\Domain\Repositories\CheckUserQuestionRepository;
use App\Community\Domain\Repositories\CheckUserSellingRepositoryInterface;
use App\Community\Domain\Repositories\CheckUserSellingRepository;
use App\Community\Domain\Repositories\CreateCommunityRepository;
use App\Community\Domain\Repositories\CreateCommunityRepositoryInterface;
use App\Community\Domain\Repositories\DeleteCommunityRepository;
use App\Community\Domain\Repositories\DeleteCommunityRepositoryInterface;
use App\Community\Domain\Repositories\SearchCommunityToTitleRepository;
use App\Community\Domain\Repositories\SearchCommunityToTitleRepositoryInterface;
use App\Community\Domain\Repositories\ShowAllCommunityRepository;
use App\Community\Domain\Repositories\ShowAllCommunityRepositoryInterface;
use App\Community\Domain\Repositories\ShowPaginateCommunityRepository;
use App\Community\Domain\Repositories\SortCommunityToSortTypeRepository;
use App\Community\Domain\Repositories\ShowPaginateCommunityRepositoryInterface;
use App\Community\Domain\Repositories\SortCommunityToSortTypeRepositoryInterface;
use App\Community\Domain\Repositories\UpdateCommunityRepository;
use App\Community\Domain\Repositories\ViewCommunityRepository;
use App\Community\Domain\Repositories\ViewCommunityRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CommunityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateCommunityRepositoryInterface::class, CreateCommunityRepository::class);
        $this->app->bind(CheckUserSellingRepositoryInterface::class, CheckUserSellingRepository::class);
        $this->app->bind(DeleteCommunityRepositoryInterface::class , DeleteCommunityRepository::class);
        $this->app->bind(ViewCommunityRepositoryInterface::class,UpdateCommunityRepository::class);
        $this->app->bind(SearchCommunityToTitleRepositoryInterface::class,SearchCommunityToTitleRepository::class);
        $this->app->bind(ShowAllCommunityRepositoryInterface::class,ShowAllCommunityRepository::class);
        $this->app->bind(ShowPaginateCommunityRepositoryInterface::class,ShowPaginateCommunityRepository::class);
        $this->app->bind(SortCommunityToSortTypeRepositoryInterface::class,SortCommunityToSortTypeRepository::class);
        $this->app->bind(ViewCommunityRepositoryInterface::class,ViewCommunityRepository::class);


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
