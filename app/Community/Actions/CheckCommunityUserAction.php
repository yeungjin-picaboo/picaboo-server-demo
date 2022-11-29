<?php

namespace App\Community\Actions;

use App\Http\Controllers\Controller;
use App\Community\Domain\Repositories\CheckUserSellingRepositoryInterface;

class CheckCommunityUserAction extends Controller
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
