<?php

namespace App\Answer\Domain\Repositories;

use App\Question\Domain\Entities\Question;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception\InvalidOrderException;

//대댓글
class CheckQuestionNumRepository implements CheckQuestionNumRepositoryInterface
{
    public function checkQuestionNum($question_num): bool // 유저가 작성한 글
    {
        $nowUser = Question::where('question_num', $question_num);

        if ($nowUser->exists()) {

            return true;
        } else {

            return false;
        }

    }
}
