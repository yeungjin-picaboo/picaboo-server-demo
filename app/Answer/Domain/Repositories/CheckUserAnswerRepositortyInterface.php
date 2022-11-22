<?php
namespace App\Answer\Domain\Repositories;

interface CheckUserAnswerRepositortyInterface{
    public function check($id):bool;
}
