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

        \Log::info(
        json_encode($nowUser->get(), JSON_UNESCAPED_UNICODE));
        if ($nowUser->exists()) {
            \Log::info('true return');
            return true;
        } else {
            \Log::info('false Return');
            return false;
        }

    }
}
