<?php

namespace App\Question\Domain\Repositories;



use Illuminate\Support\Facades\DB;


class SearchQuestionUserRepository implements SearchQuestionUserInterface
{
    public function search($search_nickname): bool // 유저가 작성한 글
    {

        $nowUser = DB::table('questions')
            ->where('user_nickname'
                , 'Like'
                ,'%'.$search_nickname['search_user'].'%'
            );

        if ($nowUser->exists()) {

            return true;
        } else {

            return false;
        }

    }
}
