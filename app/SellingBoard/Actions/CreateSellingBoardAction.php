<?php

namespace App\SellingBoard\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\SellingBoard\Domain\Repositories\CreateSellingBoardRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateSellingBoardAction extends Controller
{
    protected $createBoard;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        CreateSellingBoardRepositoryInterface $createBoard,
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
        Log::info($request);
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
