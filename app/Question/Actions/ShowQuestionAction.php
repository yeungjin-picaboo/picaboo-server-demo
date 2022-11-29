<?php


namespace App\Question\Actions;

use App\Common\Responders\RequestResponder;
use App\Http\Controllers\Controller;
use App\Question\Domain\Repositories\SearchQuestionToTitleRepositoryInterface;
use App\Question\Domain\Repositories\ShowAllQuestionRepositoryInterface;
use App\Question\Domain\Repositories\ShowPaginateQuestionRepositoryInterface;
use Illuminate\Http\Request;


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
        //쿼리스트링 파라미터에 page가 있는지 (page =  페이지네이션 할 때 필요한 파라미터 ) 가 있는지
        $page = $request->input('page');
        //쿼리스트링 파라미터에 search가 (search =  검색 할 때 필요한 파라미터 )있는지
        $search = $request->input('search');
        \Log::info($search);

        if (isset($page)) {
            // 페이지네이션 할 때 리턴해주는 값(1페이지당 12개) page => 페이지네이션 할 때 필요한 파라미터
            return $this->showPagination->showPage($page);
        } elseif (isset($search)) {
            // 검색했을 때 리턴해주는 값( 페이지 구분 x ) search => 검색 할 때 필요한 파라미터
            return $this->searchToTitle->search($search);
        } else {
            // 전체 게시글 데이터
            return $this->showQuestion->show();
        }

    }
}
