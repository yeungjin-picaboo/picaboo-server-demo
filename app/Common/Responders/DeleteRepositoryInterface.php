<?php
namespace App\Common\Responders;

interface DeleteRepositoryInterface{
    public function delete($witch_num):bool; // $question_num검사를 했을때 맞는지
}
