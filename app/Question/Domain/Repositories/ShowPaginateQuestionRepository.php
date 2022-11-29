<?php

namespace App\Question\Domain\Repositories;


use App\Question\Domain\Entities\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

class ShowPaginateQuestionRepository implements ShowPaginateQuestionRepositoryInterface
{
    public function showPage($page): object
    {

        $question = DB::table('questions')
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get()
        ;
        return $question;
    }
}

