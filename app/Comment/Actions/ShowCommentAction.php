<?php


namespace App\Comment\Actions;

use App\Common\Responders\RequestResponder;
use App\Comment\Domain\Repositories\ShowAllCommentRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ShowCommentAction extends Controller
{

    protected $showComment;
    protected $requestResponder;


    public function __construct(
        ShowAllCommentRepositoryInterface        $showComment,
        RequestResponder                         $requestResponder,
    )
    {
        $this->showComment = $showComment; //
        $this->requestResponder = $requestResponder; // CommonResponder
    }

    public function __invoke(Request $request,$post_id)
    {
        // 전체 개시글 조회

        $show = $this->showComment->show($post_id);
        return $show;

    }
}
