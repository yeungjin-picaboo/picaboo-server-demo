<?php


namespace App\Answer\Actions;

use App\Answer\Domain\Repositories\CheckQuestionNumRepositoryInterface;
use App\Answer\Domain\Repositories\CreateAnswerRepositoryInterface;
use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateAnswerAction extends Controller
{
    protected $createAnswer;
    protected $checkQuestionNum;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(

        CreateAnswerRepositoryInterface $createAnswer,
        CheckQuestionNumRepositoryInterface $checkQuestionNum,
        RequestResponder                  $requestResponder,
        RequestValidResponder             $validResponder

    )
    {
        $this->createAnswer = $createAnswer;
        $this->checkQuestionNum = $checkQuestionNum;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request,$question_num)
    {
        $valid = validator($request->only('answer'), [
            'answer' => 'required|string',
        ]);

        $QsCheck = $this->checkQuestionNum -> checkQuestionNum($question_num);

//        Log::info("this is QsCheck");
//        Log::info($QsCheck === false);

        if ($valid->fails() || $QsCheck === false) {
            return $this->validResponder->response($valid);
        }

        $data = request()->only('answer');

        $data['question_num'] = $question_num;

        Log::info("createAnswerAction data");
        Log::info($data);
        $check = $this->createAnswer->create($data);

        return $this->requestResponder->response($check, "create", "Question");

    }
}
