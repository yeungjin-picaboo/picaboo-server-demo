<?php

namespace App\Question\Domain\Repositories;


use Illuminate\Support\Facades\DB;


class ShowPaginateQuestionRepository implements ShowPaginateQuestionRepositoryInterface
{
    public function showPage($page): object
    {

        $question = DB::table('questions')
            ->skip(12 * ($page - 1))
            ->take(12)
            ->orderByDesc('question_num')
            ->get()
        ;
        return $question;
    }
}

