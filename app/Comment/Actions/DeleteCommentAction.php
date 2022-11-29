<?php

namespace App\Comment\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Comment\Domain\Repositories\CheckUserRepositoryInterface;
use App\Comment\Domain\Repositories\DeleteCommentRepositoryInterface;
use Illuminate\Http\Request;


class DeleteCommentAction extends Controller{

    protected $deleteComment;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;

    public function __construct(
        DeleteCommentRepositoryInterface $deleteComment,
        CheckUserRepositoryInterface     $checkUser,
        RequestResponder                 $requestResponder,
        CheckUserResponder               $checkUserResponder
    )
    {
        $this -> deleteComment = $deleteComment;
        $this -> checkUser = $checkUser;
        $this -> requestResponder = $requestResponder;
        $this -> checkUserResponder = $checkUserResponder;
    }
    public function __invoke(Request $request,$id)
    {
        //$id는 댓글번호

        $check = $this->checkUser->check($id);

        if($check===false){
            return $this -> checkUserResponder->response();
        }

        $delete = $this->deleteComment->delete($id);

        return $this->requestResponder->response($delete,"delete" , "board");
    }
}
