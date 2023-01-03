<?php


namespace App\Question\Domain\Repositories;

use App\Common\Responders\DeleteRepositoryInterface;
use App\Question\Domain\Entities\Question;

class DeleteQuestionRepository implements DeleteRepositoryInterface
{

    public function delete($question_num): bool
    {
        \Log::info('hi');
        \Log::info($question_num);
        if (Question::where('question_num', $question_num)->exists()) { // 선택한 글 번호를 찾기
            $deleteSell = Question::find($question_num);
            $deleteSell -> delete();
            return true;
        } else {
            return false;
        }

    }
}
