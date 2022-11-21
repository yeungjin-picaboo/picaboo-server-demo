<?php

namespace App\SellingBoard\Actions;

use App\Http\Controllers\Controller;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepositortyInterface;

class CheckSellingBoardUserAction extends Controller
{
    protected $checkUser;

    public function __construct(
        CheckUserSellingRepositortyInterface $checkUser
    )
    {
        $this -> checkUser = $checkUser;
    }

    public function __invoke($id){
        $check = $this->checkUser->check($id);
        return $check; // middleware의 Auth랑 비슷함
    }
}
