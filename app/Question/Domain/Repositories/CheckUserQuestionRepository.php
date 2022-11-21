<?php
namespace App\Question\Domain\Repositories;

use App\Question\Domain\Entities\Question;

class CheckUserQuestionRepository implements CheckUserQuestionRepositortyInterface {
    public function check($question_num): bool // 유저가 작성한 글이 맞는지 확인하는 클래스
    {
//        \Log::info('num is'.$selling_num);
        $nowUser = Question::where('question_num',$question_num);

        if($nowUser->exists()){
            if(\Auth::user()->email !== $nowUser->value('email')){
                return false;
            }
        };
        return true;
    }
}
