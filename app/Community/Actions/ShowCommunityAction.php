<?php


namespace App\Community\Actions;

use App\Common\Responders\RequestResponder;
use App\Community\Domain\Repositories\SearchCommunityToTitleRepositoryInterface;
use App\Community\Domain\Repositories\ShowAllCommunityRepositoryInterface;
use App\Community\Domain\Repositories\ShowPaginateCommunityRepositoryInterface;
use App\Community\Domain\Repositories\SortCommunityToSortTypeRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ShowCommunityAction extends Controller
{

    protected $showCommunity;
//    protected $showPagination;
    protected $searchToTitle;
    protected $requestResponder;
    protected $sortCommunity;


    public function __construct(
        ShowAllCommunityRepositoryInterface      $showCommunity,
        ShowPaginateCommunityRepositoryInterface $showPagination,
        SearchCommunityToTitleRepositoryInterface $searchToTitle,
        SortCommunityToSortTypeRepositoryInterface $sortCommunity,
        RequestResponder                        $requestResponder,


    )
    {
        $this->showCommunity = $showCommunity; // 전체 질문글
        $this->requestResponder = $requestResponder; // CommonResponder
        $this->showPagination = $showPagination;
        $this->searchToTitle = $searchToTitle;
        $this->sortCommunity = $sortCommunity;
    }

    public function __invoke(Request $request)
    {
        //쿼리스트링 파라미터에 page가 있는지
        $page = $request->input('page');
        //쿼리스트링 파라미터에 search가 있는지
        $search = $request->input('search');
        \Log::info($search);
        $sortType = $request->input('sortType');

        if (isset($page)) {
            $paginate = $this->showPagination->showPage($page);
            return $paginate;
        } else if (isset($search)) {
            // 검색정보
            $searchTitle = $this->searchToTitle->search($search);
            return $searchTitle;
        } else if (isset($sortType)){
            // 정렬정보
            $sortData = $this->sortCommunity->sort($sortType);
            return $sortData;
        } else {
            // 전체 개시글 조회
            $show = $this->showCommunity->show();
            return $show;
        }

    }
}
