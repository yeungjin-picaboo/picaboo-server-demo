<?php
namespace App\Community\Domain\Repositories;

interface DeleteCommunityRepositoryInterface{
    public function delete($selling_num):bool; // $selling_num검사를 했을때 맞는지
}
