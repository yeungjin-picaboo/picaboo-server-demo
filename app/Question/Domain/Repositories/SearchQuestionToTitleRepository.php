<?php

namespace App\Question\Domain\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class SearchQuestionToTitleRepository implements SearchQuestionToTitleRepositoryInterface
{
    public function search($search_content): object // 유저가 작성한 글
    {
        \Log::info($search_content);
        $nowUser = DB::table('questions')
            ->where('question'
                , 'Like'
                , '%' . $search_content . '%'
            )->get();

        \Log::info($nowUser);
        return $nowUser;


    }
}
