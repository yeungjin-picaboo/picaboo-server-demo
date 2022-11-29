<?php

namespace App\Comment\Actions;

use App\Comment\Domain\Repositories\UpdateCommentRepositoryInterface;
use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Comment\Domain\Repositories\CheckUserRepositoryInterface;
use Illuminate\Http\Request;
use App\Common\Responders\RequestValidResponder;

class UpdateCommentAction extends Controller
{
    protected $editComment;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;
    protected $validResponder;

    public function __construct(
        UpdateCommentRepositoryInterface $editComment,
        CheckUserRepositoryInterface   $checkUser,
        RequestResponder               $requestResponder,
        CheckUserResponder             $checkUserResponder,
        RequestValidResponder          $validResponder
    )
    {
        $this->editComment = $editComment;
        $this->checkUser = $checkUser;
        $this->requestResponder = $requestResponder;
        $this->checkUserResponder = $checkUserResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request,$id)
    {


        $valid = validator($request->only('comment'),[
            'comment' =>'required|string|max:255',
        ]);

        if($valid->fails()){
            return $this->validResponder->response($valid);
        }
        \info("Err");
        $check = $this->checkUser->check($id); //TODO 유저의 유효성을 검사하는 코드

        if($check == false){
            return $this -> checkUserResponder->response();
        }

        $edit = $this->editComment->edited($id,$request);

        return $this->requestResponder->response($edit,"edited","board");

    }

}
