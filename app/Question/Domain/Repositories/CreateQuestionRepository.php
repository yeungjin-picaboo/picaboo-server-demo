<?php

namespace App\Question\Domain\Repositories;


use App\Question\Domain\Entities\Question;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class CreateQuestionRepository implements CreateQuestionRepositoryInterface
{
    public function create($data): bool
    {
        \Log::info($data);
        \Log::info(Auth::user());
        $question = Question::create([
            'question' => $data['question'],
            'description' => $data['description'],
            'writer' => Auth::user()->user_nickname,
            'isPrivate' => $data['isPrivate'],//Auth::user()->user_nickname
        ]);
        \Log::info('this data is '.$question);

        if ($question) {
            return true;
        } else {
            return false;
        }
    }
}

