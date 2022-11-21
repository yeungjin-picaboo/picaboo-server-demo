<?php

namespace App\Providers;

use App\SellingBoard\Actions\DeleteSellingBoardAction;
use App\SellingBoard\Domain\Repositories\CheckUserQuestionRepository;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepositortyInterface;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepository;
use App\SellingBoard\Domain\Repositories\CreateSellingBoardRepository;
use App\SellingBoard\Domain\Repositories\CreateSellingBoardRepositoryInterface;
use App\SellingBoard\Domain\Repositories\DeleteSellingBoardRepository;
use App\SellingBoard\Domain\Repositories\DeleteSellingBoardRepositoryInterface;
use App\SellingBoard\Domain\Repositories\EditSellingBoardRepository;
use App\SellingBoard\Domain\Repositories\EditSellingBoardRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BoardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CreateSellingBoardRepositoryInterface::class, CreateSellingBoardRepository::class);
        $this->app->bind(CheckUserSellingRepositortyInterface::class, CheckUserSellingRepository::class);
        $this->app->bind(DeleteSellingBoardRepositoryInterface::class , DeleteSellingBoardRepository::class);
        $this->app->bind(EditSellingBoardRepositoryInterface::class,EditSellingBoardRepository::class);

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
