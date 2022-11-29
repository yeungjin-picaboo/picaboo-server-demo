<?php
namespace App\Community\Domain\Repositories;

interface CheckUserSellingRepositoryInterface{
    public function check($id):bool;
}
