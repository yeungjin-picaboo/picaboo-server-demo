<?php

namespace App\Question\Domain\Repositories;


use App\Question\Domain\Entities\Question;
use Illuminate\Support\Facades\Auth;

class CreateQuestionRepository implements CreateQuestionRepositoryInterface
{
    public function create($data): bool
    {
        $question = Question::create([
            'question_title' => $data['question'],
            'question_content' => $data['description'],
            'email' => "qweqwe@gmail.com",//Auth::user()->email,
            'user_nickname' => "asdad",//Auth::user()->user_nickname,
            'views' => 1,
        ]);
        \Log::info('this data is '.$question);

        if ($question) {
            return true;
        } else {
            return false;
        }
    }
}

