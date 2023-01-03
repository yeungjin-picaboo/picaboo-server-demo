<?php

namespace App\Community\Actions;

use App\Comment\Domain\Repositories\UpdateCommentRepositoryInterface;
use App\Common\Responders\CheckUserResponder;
use App\Common\Responders\RequestResponder;
use App\Community\Domain\Repositories\UpdateCommunityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Community\Domain\Repositories\CheckUserSellingRepositoryInterface;
use Illuminate\Http\Request;
use App\Common\Responders\RequestValidResponder;

class UpdateCommunityAction extends Controller
{
    protected $editCommunity;
    protected $checkUser;
    protected $requestResponder;
    protected $checkUserResponder;
    protected $validResponder;

    public function __construct(
        UpdateCommunityRepositoryInterface    $editCommunity,
        CheckUserSellingRepositoryInterface $checkUser,
        RequestResponder                    $requestResponder,
        CheckUserResponder                  $checkUserResponder,
        RequestValidResponder               $validResponder
    )
    {
        $this->editCommunity = $editCommunity;
        $this->checkUser = $checkUser;
        $this->requestResponder = $requestResponder;
        $this->checkUserResponder = $checkUserResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request, $id)
    {

        \Log::info($request);
        \Log::info("hi");
        $valid = validator($request->only('title', 'content'), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if ($valid->fails()) {
            return $this->validResponder->response($valid);
        }


        $check = $this->checkUser->check($id); //TODO 유저의 유효성을 검사하는 코드

        if ($check == false) {
            return $this->checkUserResponder->response();
        }
        \Log::info("3333");
        $edit = $this->editCommunity->edited($id, $request);
        \Log::info("4444");
        return $this->requestResponder->response($edit, "edited", "board");

    }

}
