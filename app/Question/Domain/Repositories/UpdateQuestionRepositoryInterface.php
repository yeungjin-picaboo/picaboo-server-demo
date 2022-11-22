<?php
namespace App\Question\Domain\Repositories;

interface UpdateQuestionRepositoryInterface{
    function update($question_num,$modify_content):bool;
}
