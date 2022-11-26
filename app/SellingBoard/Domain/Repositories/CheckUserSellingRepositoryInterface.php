<?php
namespace App\SellingBoard\Domain\Repositories;

interface CheckUserSellingRepositoryInterface{
    public function check($id):bool;
}
