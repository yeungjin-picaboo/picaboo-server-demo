<?php


namespace App\Question\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\DeleteRepositoryInterface;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Question\Domain\Repositories\CheckUserQuestionRepositoryInterface;
use App\Question\Domain\Repositories\DeleteQuestionRepositoryInterface;
use Illuminate\Support\Facades\Request;


class DeleteQuestionAction extends Controller
{

    protected $deleteQuestion;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;

    public function __construct(
        DeleteRepositoryInterface     $deleteQuestion,
        CheckUserQuestionRepositoryInterface $checkUser,
        RequestResponder                      $requestResponder,
        CheckUserResponder                    $checkUserResponder
    )
    {
        $this->deleteQuestion = $deleteQuestion; // 삭제하려는 질문글
        $this->checkUser = $checkUser;           // 글을 쓴 유저가 맞는지
        $this->requestResponder = $requestResponder; // CommonResponder
        $this->checkUserResponder = $checkUserResponder;
    }

    public function __invoke(Request $request, $Question_num)
    {

        $check = $this->checkUser->check($Question_num);

        if ($check === false) { // 유효하지 않은 글번호일시
            return $this->checkUserResponder->response();
        }

        $delete = $this->deleteQuestion->delete($Question_num);
        // 삭제하기
        \Log::info('sex');
        return $this->requestResponder->response($delete, "delete", "board");
    }
}
