<?php


namespace App\Question\Domain\Repositories;

use App\Question\Domain\Entities\Question;

class DeleteQuestionRepository implements DeleteQuestionRepositoryInterface
{

    public function delete($question_num): bool
    {
        if (Question::where('question_num', $question_num)->exists()) { // 선택한 글 번호를 찾기
            $deleteSell = Question::find($question_num);
            $deleteSell -> delete();
            return true;
        } else {
            return false;
        }

    }
}
