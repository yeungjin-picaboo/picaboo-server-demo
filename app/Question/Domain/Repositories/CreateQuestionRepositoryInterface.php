<?php
namespace App\Question\Domain\Repositories;

interface CreateQuestionRepositoryInterface{
    public function create($data):bool;
}
