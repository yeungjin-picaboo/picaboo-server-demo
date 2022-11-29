<?php

namespace App\Community\Domain\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class SearchCommunityToTitleRepository implements SearchCommunityToTitleRepositoryInterface
{
    public function search($search_content): object // 유저가 작성한 글
    {

        $searchInfo = DB::table('Communities')
            ->where('title'
                , 'Like'
                , '%' . $search_content . '%'
            )->get();

        return $searchInfo;


    }
}
