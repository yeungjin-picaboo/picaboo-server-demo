<?php

namespace App\SellingBoard\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepositortyInterface;
use App\SellingBoard\Domain\Repositories\DeleteSellingBoardRepositoryInterface;
use Illuminate\Support\Facades\Request;


class DeleteSellingBoardAction extends Controller{

    protected $deleteBoard;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;

    public function __construct(
        DeleteSellingBoardRepositoryInterface $deleteBoard,
        CheckUserSellingRepositortyInterface  $checkUser,
        RequestResponder                      $requestResponder,
        CheckUserResponder                    $checkUserResponder
    )
    {
        $this -> deleteBoard = $deleteBoard;
        $this -> checkUser = $checkUser;
        $this -> requestResponder = $requestResponder;
        $this -> checkUserResponder = $checkUserResponder;
    }
    public function __invoke(Request $request,$id)
    {
        \Log::info($id);
        $check = $this->checkUser->check($id);

        if($check==false){
            return $this -> checkUserResponder->response();
        }

        $delete = $this->deleteBoard->delete($id);

        return $this->requestResponder->response($delete,"delete" , "board");
    }
}
