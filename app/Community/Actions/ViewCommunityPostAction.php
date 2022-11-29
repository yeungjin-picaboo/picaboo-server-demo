<?php

namespace App\Community\Actions;

use App\Common\Responders\RequestResponder;
use App\Common\Responders\RequestValidResponder;
use App\Community\Domain\Repositories\ViewCommunityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Community\Domain\Repositories\CreateCommunityRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ViewCommunityPostAction extends Controller
{
    protected $viewpost;

    protected $requestResponder;
    protected $validResponder;

    public function __construct(
        ViewCommunityRepositoryInterface $viewpost,

        RequestResponder                      $requestResponder,
        RequestValidResponder                 $validResponder
    )
    {
        $this->viewpost = $viewpost;
        $this->requestResponder = $requestResponder;
        $this->validResponder = $validResponder;
    }

    public function __invoke(Request $request,$id)
    {

        $post = $this->viewpost->view($id);
        return $post;
    }
}
