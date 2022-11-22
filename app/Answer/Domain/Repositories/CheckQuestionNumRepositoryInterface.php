<?php

namespace App\Answer\Domain\Repositories;

interface CheckQuestionNumRepositoryInterface{
    /***
     * @param int $question_num 질문넘버
     * @return bool
     */
    public function checkQuestionNum($question_num):bool;
}
