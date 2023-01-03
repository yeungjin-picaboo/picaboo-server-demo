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

    public function __invoke(Request $request)
    {
        // 전체 댓글 조회
        \Log::info("조회하기");
        $post_id = $request->input('post_id');
        $show = $this->showComment->show($post_id);
        return $show;

    }
}
