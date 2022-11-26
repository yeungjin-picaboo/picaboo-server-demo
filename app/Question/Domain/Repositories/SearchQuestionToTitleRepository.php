<?php

namespace App\Question\Domain\Repositories;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class SearchQuestionToTitleRepository implements SearchQuestionToTitleRepositoryInterface
{
    public function search($search_content): bool // 유저가 작성한 글
    {
        $nowUser = DB::table('questions')
            ->where('question_title'
                , 'Like'
                ,'%'.$search_content['search_title'].'%'
            );

        if ($nowUser->exists()) {
            \Log::info('true return');
            return true;
        } else {
            \Log::info('false Return');
            return false;
        }

    }
}
