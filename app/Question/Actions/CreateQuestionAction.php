<?php


namespace App\Question\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\Question\Domain\Repositories\CreateQuestionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateQuestionAction extends Controller
{
    protected $createQuestion;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        CreateQuestionRepositoryInterface $createQuestion,
        RequestResponder                  $requestResponder,
        RequestValidResponder             $validResponder
    )
    {
        $this->createQuestion = $createQuestion;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request)
    {
        Log::info("In CreateQuestionAction");
        Log::info($request);
        $valid = validator($request->only('Question_title', 'Question_content'), [
            'Question_title' => 'required|string|max:255',
            'Question_content' => 'required|string',
        ]);


        if ($valid->fails()) {
            return $this->validResponder->response($valid);
        }

        $data = request()->only('Question_title', 'Question_content');

        Log::info($data);
        $check = $this->createQuestion->create($data);

        return $this->requestResponder->response($check, "create", "Question");

    }
}
