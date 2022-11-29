<?php

namespace App\Community\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\Community\Domain\Repositories\CreateCommunityRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateCommunityAction extends Controller
{
    protected $createBoard;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        CreateCommunityRepositoryInterface $createBoard,
        RequestResponder                      $requestResponder,
        RequestValidResponder                 $validResponder
    )
    {
        $this->createBoard = $createBoard;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request)
    {

        $valid = validator($request->only('title', 'content'), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);


        if ($valid->fails()) {
            return $this->validResponder->response($valid);
        }

        $data = request()->only('title', 'content');

        $check = $this->createBoard->create($data);

        return $this->requestResponder->response($check, "create", "selling");

    }
}
