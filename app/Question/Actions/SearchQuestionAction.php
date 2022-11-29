<?php


namespace App\Question\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\Question\Domain\Repositories\SearchQuestionToTitleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchQuestionAction extends Controller
{
    protected $searchQuestion;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        SearchQuestionToTitleRepositoryInterface $searchQuestion,
        RequestResponder                  $requestResponder,
        RequestValidResponder             $validResponder
    )
    {
        $this->searchQuestion = $searchQuestion;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request)
    {

        $valid = validator($request->only( 'search_title'), [
            'search_title' => 'required|string|max:255',
        ]);


        if ($valid->fails()) {
            return $this->validResponder->response($valid);
        }

        $data = request()->only('search_title');


        $check = $this->searchQuestion->search($data);

        return $this->requestResponder->response($check, "Search", "question");

    }
}
