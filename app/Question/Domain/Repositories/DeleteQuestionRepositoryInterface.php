<?php
namespace App\Question\Domain\Repositories;

interface DeleteQuestionRepositoryInterface{
    public function delete($question_num):bool; // $question_num검사를 했을때 맞는지
}
