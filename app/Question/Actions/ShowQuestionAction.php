<?php


namespace App\Question\Actions;

use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Question\Domain\Repositories\SearchQuestionToTitleRepositoryInterface;
use App\Question\Domain\Repositories\ShowAllQuestionRepositoryInterface;
use App\Question\Domain\Repositories\ShowPaginateQuestionRepositoryInterface;
use Illuminate\Http\Request;
use Mockery\Undefined;

//use Illuminate\Support\Facades\Request;


class ShowQuestionAction extends Controller
{

    protected $showQuestion;
    protected $requestResponder;
    protected $showPagination;
    protected $searchToTitle;


    public function __construct(
        ShowAllQuestionRepositoryInterface      $showQuestion,
        ShowPaginateQuestionRepositoryInterface $showPagination,
        SearchQuestionToTitleRepositoryInterface $searchToTitle,
        RequestResponder                        $requestResponder,


    )
    {
        $this->showQuestion = $showQuestion; // 전체 질문글
        $this->requestResponder = $requestResponder; // CommonResponder
        $this->showPagination = $showPagination;
        $this->searchToTitle = $searchToTitle;
    }

    public function __invoke(Request $request)
    {
        //쿼리스트링 파라미터에 page가 있는지
        $page = $request->input('page');
        //쿼리스트링 파라미터에 search가 있는지
        $search = $request->input('search');
        \Log::info($search);

        if (isset($page)) {
            $paginate = $this->showPagination->showPage($page);
            return $paginate;
        } else if (isset($search)) {
            $searchTitle = $this->searchToTitle->search($search);
            return $searchTitle;
        } else {
            // 전체 개시글 조회
            $show = $this->showQuestion->show();
            return $show;
        }

    }
}
