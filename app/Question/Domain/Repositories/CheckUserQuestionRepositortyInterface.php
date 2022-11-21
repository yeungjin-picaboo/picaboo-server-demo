<?php
namespace App\Question\Domain\Repositories;

interface CheckUserQuestionRepositortyInterface{
    public function check($id):bool;
}
