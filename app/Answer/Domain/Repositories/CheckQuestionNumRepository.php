<?php

namespace App\Answer\Domain\Repositories;

use App\Answer\Domain\Entities\Answer;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception\InvalidOrderException;


class CheckQuestionNumRepository implements CheckQuestionNumRepositoryInterface
{
    public function checkQuestionNum($question_num): bool // 유저가 작성한 글
    {
        $nowUser = Answer::where('answer_num', $question_num)->reportable(
            function (InvalidOrderException $e){
                return false;
            }
        );

        if ($nowUser->exists()) {
                \Log::info('true return');
                return true;
        }else{
            \Log::info('false Return');
            return false;
        }

    }
}
