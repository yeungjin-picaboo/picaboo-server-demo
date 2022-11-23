<?php
namespace App\Question\Domain\Repositories;

interface CheckUserQuestionRepositoryInterface{
    /**
     * @param $question_num 글 번호
     * @return bool
     */
    public function check($question_num):bool;
}
