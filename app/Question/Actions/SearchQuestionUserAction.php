<?php


namespace App\Question\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\Question\Domain\Repositories\SearchQuestionRepositoryInterface;
use App\Question\Domain\Repositories\SearchQuestionUserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchQuestionUserAction extends Controller
{
    protected $searchQuestionUser;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        SearchQuestionUserInterface $searchQuestionUser,
        RequestResponder            $requestResponder,
        RequestValidResponder       $validResponder
    )
    {
        $this->searchQuestionUser = $searchQuestionUser;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request)
    {

        $valid = validator($request->only('search_user'), [
            'search_user' => 'required|string|max:255',
        ]);


        if ($valid->fails()) {
            return $this->validResponder->response($valid);
        }

        $data = request()->only('search_user');

        $check = $this->searchQuestionUser->search($data);

        return $this->requestResponder->response($check, "Search", "questionUser");

    }
}
