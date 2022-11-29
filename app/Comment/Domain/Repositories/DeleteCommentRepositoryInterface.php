<?php
namespace App\Comment\Domain\Repositories;

interface DeleteCommentRepositoryInterface{
    public function delete($id):bool; // $selling_num검사를 했을때 맞는지
}
