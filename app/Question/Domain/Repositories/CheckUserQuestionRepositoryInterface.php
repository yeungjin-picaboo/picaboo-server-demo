<?php
namespace App\Question\Domain\Repositories;

interface CheckUserQuestionRepositoryInterface{
    public function check($id):bool;
}
