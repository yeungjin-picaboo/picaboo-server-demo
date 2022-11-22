<?php
namespace App\Answer\Domain\Repositories;

interface DeleteAnswerRepositoryInterface{
    public function delete($Answer_num):bool; // $Answer_num검사를 했을때 맞는지
}
