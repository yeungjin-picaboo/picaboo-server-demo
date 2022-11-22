<?php

namespace App\Answer\Domain\Repositories;


use App\Answer\Domain\Entities\Answer;
use Illuminate\Support\Facades\Auth;

class CreateAnswerRepository implements CreateAnswerRepositoryInterface
{
    public function create($data): bool
    {
        $answer = Answer::create([
            'answer' => $data['answer'],
            'email' => Auth::user()->email,
            'user_nickname' => Auth::user()->user_nickname,
            'question_num' => $data['question_num'],
            'views' => 1,
        ]);
        \Log::info('this data is '.$answer);

        if ($answer) {
            return true;
        } else {
            return false;
        }
    }
}

