<?php

namespace App\Answer\Actions;

use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\Answer\Domain\Repositories\CheckUserAnswerRepositortyInterface;
use App\Answer\Domain\Repositories\UpdateAnswerRepositoryInterface;
use Illuminate\Http\Request;

class UpdateAnswerAction extends Controller
{
    protected $editAnswer;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;
    protected $validResponder;

    public function __construct(
        UpdateAnswerRepositoryInterface     $editAnswer,
        CheckUserAnswerRepositortyInterface  $checkUser,
        RequestResponder                      $requestResponder,
        CheckUserResponder                    $checkUserResponder,
        RequestValidResponder                 $validResponder
    )
    {
        $this->editAnswer = $editAnswer;
        $this->checkUser = $checkUser;
        $this->requestResponder = $requestResponder;
        $this->checkUserResponder = $checkUserResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request,$answer_num)
    {
        \Log::info($request);
        $valid = validator($request->only('answer'),[
            'answer' =>'required|string',
        ]);

        if($valid->fails()){
            return $this->validResponder->response($valid);
        }

        $check = $this->checkUser->check($answer_num); //TODO 유저의 유효성을 검사하는 코드

        if($check == false){
            return $this -> checkUserResponder->response();
        }

        $edit = $this->editAnswer->update($answer_num,$request);

        return $this->requestResponder->response($edit,"edited","Answer");

    }

}

