<?php


namespace App\Answer\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Answer\Domain\Repositories\CheckUserAnswerRepositortyInterface;
use App\Answer\Domain\Repositories\DeleteAnswerRepositoryInterface;
use Illuminate\Support\Facades\Request;


class DeleteAnswerAction extends Controller
{

    protected $deleteAnswer;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;

    public function __construct(
        DeleteAnswerRepositoryInterface     $deleteAnswer,
        CheckUserAnswerRepositortyInterface $checkUser,
        RequestResponder                      $requestResponder,
        CheckUserResponder                    $checkUserResponder
    )
    {
        $this->deleteAnswer = $deleteAnswer; // 삭제하려는 질문글
        $this->checkUser = $checkUser;           // 글을 쓴 유저가 맞는지
        $this->requestResponder = $requestResponder; // CommonResponder
        $this->checkUserResponder = $checkUserResponder;
    }

    public function __invoke(Request $request, $answer_num)
    {

        $check = $this->checkUser->check($answer_num);
        // 유효한 글번호인지, 그 글을 작성한 사용자는 맞는지 검사

        if ($check == false) {
            return $this->checkUserResponder->response();
        }

        $delete = $this->deleteAnswer->delete($answer_num);
        // 삭제하기

        return $this->requestResponder->response($delete, "delete", "Answer");
    }
}
