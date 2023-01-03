<?php
namespace App\Question\Domain\Repositories;

use App\Question\Domain\Entities\Question;

class CheckUserQuestionRepository implements CheckUserQuestionRepositoryInterface {
    public function check($question_num): bool // 유저가 작성한 글이 맞는지 확인하는 클래스
    {
        $nowUser = Question::where('question_num',$question_num);

        \Log::info(\Auth::user());
        \Log::info($nowUser->value('writer'));

        if($nowUser->exists()){
            if(\Auth::user()->user_nickname !== $nowUser->value('writer')){
                return false;
            }
        };
        return true;
    }
}
