<?php

namespace App\Question\Domain\Repositories;


use App\Question\Domain\Entities\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Passport;

class ShowAllQuestionRepository implements ShowAllQuestionRepositoryInterface
{
    public function show(): object
    {
        $question = DB::table('questions')->orderByDesc('question_num')->get();
        Log::info($question);
        return $question;
    }
}

