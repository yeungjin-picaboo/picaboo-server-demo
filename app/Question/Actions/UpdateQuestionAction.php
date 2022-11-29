<?php

namespace App\Question\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;


use App\Question\Domain\Repositories\CheckUserQuestionRepositoryInterface;
use App\Question\Domain\Repositories\UpdateQuestionRepositoryInterface;
use Illuminate\Http\Request;
use App\Common\Responders\RequestValidResponder;

class UpdateQuestionAction extends Controller
{
    protected $editQuestion;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;
    protected $validResponder;

    public function __construct(
        UpdateQuestionRepositoryInterface $editQuestion,
        CheckUserQuestionRepositoryInterface  $checkUser,
        RequestResponder                      $requestResponder,
        CheckUserResponder                    $checkUserResponder,
        RequestValidResponder                 $validResponder
    )
    {
        $this->editQuestion = $editQuestion;
        $this->checkUser = $checkUser;
        $this->requestResponder = $requestResponder;
        $this->checkUserResponder = $checkUserResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request,$question_num)
    {
        // question_num(질문 글 번호) -> url api/qna/{question_num}

        //TODO 입력한 값 유효성 검사
        $valid = validator($request->only('question' , 'description'),[
            'question' =>'required|string|max:255',
            'description'=> 'required|string',
        ]);

        if($valid->fails()){
            return $this->validResponder->response($valid);
        }

        //TODO 유저의 유효성 및 글번호를 검사하는 코드 -> CheckUserQuestionRepository 함수 사용
        $check = $this->checkUser->check($question_num);

        if($check == false){
            return $this -> checkUserResponder->response();
        }

        // question_num = 질문글 번호 / request에는 question, description이 있음
        $edit = $this->editQuestion->update($question_num,$request);

        return $this->requestResponder->response($edit,"edited","Question");

    }

}
