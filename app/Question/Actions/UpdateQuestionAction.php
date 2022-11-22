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

    public function __invoke(Request $request,$Question_num)
    {
        \Log::info($request);
        $valid = validator($request->only('Question_title' , 'Question_content'),[
            'Question_title' =>'required|string|max:255',
            'Question_content'=> 'required|string',
        ]);

        if($valid->fails()){
            return $this->validResponder->response($valid);
        }

        $check = $this->checkUser->check($Question_num); //TODO 유저의 유효성을 검사하는 코드

        if($check == false){
            return $this -> checkUserResponder->response();
        }

        $edit = $this->editQuestion->update($Question_num,$request);

        return $this->requestResponder->response($edit,"edited","Question");

    }

}
