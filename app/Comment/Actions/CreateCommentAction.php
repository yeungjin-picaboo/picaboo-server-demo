<?php

namespace App\Comment\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Http\Controllers\Controller;
use App\Comment\Domain\Repositories\CreateCommentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateCommentAction extends Controller
{
    protected $createComment;
    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        CreateCommentRepositoryInterface $createComment,
        RequestResponder                 $requestResponder,
        RequestValidResponder            $validResponder
    )
    {
        $this->createComment = $createComment;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request)
    {
        $page = $request->input('page_id');
        Log::info($request);
        $valid = validator($request->only('comment', 'page_id'), [
            'comment' => 'required|string|max:255',
            'page_id' => 'required|integer',
        ]);


        if ($valid->fails()) {
            return $this->validResponder->response($valid);
        }

        $data = request()->only('page_id', 'comment');

        $check = $this->createComment->create($data);

        return $this->requestResponder->response($check, "create", "selling");

    }
}
