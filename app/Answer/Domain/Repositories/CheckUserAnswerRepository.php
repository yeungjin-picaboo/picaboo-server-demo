<?php

namespace App\Answer\Domain\Repositories;

use App\Answer\Domain\Entities\Answer;
use Illuminate\Support\Facades\Auth;


class CheckUserAnswerRepository implements CheckUserAnswerRepositortyInterface
{
    public function check($answer_num): bool // 유저가 작성한 글
    {
//        \Log::info('num is'.$Answer_num);
        $nowUser = Answer::where('answer_num', $answer_num);

        if ($nowUser->exists()) {
            if (Auth::user()->email !== $nowUser->value('email') &&
                Auth::user()->permission !== 0) {
                return false;
            }
        };
        return true;
    }
}
