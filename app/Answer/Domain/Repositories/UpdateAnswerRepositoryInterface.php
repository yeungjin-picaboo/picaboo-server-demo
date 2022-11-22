<?php
namespace App\Answer\Domain\Repositories;

interface UpdateAnswerRepositoryInterface{
    /**
     * @param $answer_num 글번호 가져오기
     * @param $modify_content 수정할 부분
     * @return bool
     */
    function update($answer_num,$modify_content):bool;
}
