<?php

namespace App\SellingBoard\Actions;

use App\Http\Controllers\Controller;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepositoryInterface;

class CheckSellingBoardUserAction extends Controller
{
    protected $checkUser;

    public function __construct(
        CheckUserSellingRepositoryInterface $checkUser
    )
    {
        $this -> checkUser = $checkUser;
    }

    public function __invoke($id){
        $check = $this->checkUser->check($id);
        return $check; // middleware의 Auth랑 비슷함
    }
}
