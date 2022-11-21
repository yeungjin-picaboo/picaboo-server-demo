<?php
namespace App\SellingBoard\Domain\Repositories;

interface DeleteSellingBoardRepositoryInterface{
    public function delete($selling_num):bool; // $selling_num검사를 했을때 맞는지
}
