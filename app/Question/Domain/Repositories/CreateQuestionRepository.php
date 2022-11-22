<?php

namespace App\Question\Domain\Repositories;


use App\Question\Domain\Entities\Question;
use Illuminate\Support\Facades\Auth;

class CreateQuestionRepository implements CreateQuestionRepositoryInterface
{
    public function create($data): bool
    {
        $question = Question::create([
            'question_title' => $data['question_title'],
            'question_content' => $data['question_content'],
            'email' => Auth::user()->email,
            'user_nickname' => Auth::user()->user_nickname,
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

