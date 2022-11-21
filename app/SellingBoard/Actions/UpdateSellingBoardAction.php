<?php

namespace App\SellingBoard\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\SellingBoard\Domain\Repositories\CheckUserSellingRepositortyInterface;
use App\SellingBoard\Domain\Repositories\EditSellingBoardRepositoryInterface;
use Illuminate\Http\Request;
use App\Common\Responders\RequestValidResponder;

class UpdateSellingBoardAction extends Controller
{
    protected $editSellingBoard;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;
    protected $validResponder;

    public function __construct(
        EditSellingBoardRepositoryInterface  $editSellingBoard,
        CheckUserSellingRepositortyInterface $checkUser,
        RequestResponder                     $requestResponder,
        CheckUserResponder                   $checkUserResponder,
        RequestValidResponder                $validResponder
    )
    {
        $this->editSellingBoard = $editSellingBoard;
        $this->checkUser = $checkUser;
        $this->requestResponder = $requestResponder;
        $this->checkUserResponder = $checkUserResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request,$id)
    {
        \Log::info($request);
        $valid = validator($request->only('title' , 'content'),[
            'title' =>'required|string|max:255',
            'content'=> 'required|string',
        ]);

        if($valid->fails()){
            return $this->validResponder->response($valid);
        }

        $check = $this->checkUser->check($id); //TODO 유저의 유효성을 검사하는 코드

        if($check == false){
            return $this -> checkUserResponder->response();
        }

        $edit = $this->editSellingBoard->edited($id,$request);

        return $this->requestResponder->response($edit,"edited","board");

    }

}
