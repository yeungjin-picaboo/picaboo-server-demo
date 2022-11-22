<?php


namespace App\Answer\Domain\Repositories;

use App\Answer\Domain\Entities\Answer;

class DeleteAnswerRepository implements DeleteAnswerRepositoryInterface
{

    public function delete($Answer_num): bool
    {
        if (Answer::where('Answer_num', $Answer_num)->exists()) { // 선택한 글 번호를 찾기
            $deleteSell = Answer::find($Answer_num);
            $deleteSell -> delete();
            return true;
        } else {
            return false;
        }

    }
}
