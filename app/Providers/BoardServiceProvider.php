<?php

namespace App\Providers;

use App\SellingBoard\Actions\DeleteSellingBoardAction;
use App\SellingBoard\Domain\Repositories\CheckUserQuestionRepository;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepositoryInterface;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepository;
use App\SellingBoard\Domain\Repositories\CreateSellingBoardRepository;
use App\SellingBoard\Domain\Repositories\CreateSellingBoardRepositoryInterface;
use App\SellingBoard\Domain\Repositories\DeleteSellingBoardRepository;
use App\SellingBoard\Domain\Repositories\DeleteSellingBoardRepositoryInterface;
use App\SellingBoard\Domain\Repositories\UpdateSellingBoardRepository;
use App\SellingBoard\Domain\Repositories\UpdateSellingBoardRepositoryInterface;
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
        $this->app->bind(CheckUserSellingRepositoryInterface::class, CheckUserSellingRepository::class);
        $this->app->bind(DeleteSellingBoardRepositoryInterface::class , DeleteSellingBoardRepository::class);
        $this->app->bind(UpdateSellingBoardRepositoryInterface::class,UpdateSellingBoardRepository::class);

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
