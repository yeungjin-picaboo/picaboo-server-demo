<?php

namespace App\Community\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Community\Domain\Repositories\CheckUserSellingRepositoryInterface;
use App\Community\Domain\Repositories\DeleteCommunityRepositoryInterface;
use Illuminate\Support\Facades\Request;


class DeleteCommunityAction extends Controller{

    protected $deleteBoard;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;

    public function __construct(
        DeleteCommunityRepositoryInterface $deleteBoard,
        CheckUserSellingRepositoryInterface   $checkUser,
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
        $check = $this->checkUser->check($id);

        if($check===false){
            return $this -> checkUserResponder->response();
        }

        $delete = $this->deleteBoard->delete($id);

        return $this->requestResponder->response($delete,"delete" , "board");
    }
}
