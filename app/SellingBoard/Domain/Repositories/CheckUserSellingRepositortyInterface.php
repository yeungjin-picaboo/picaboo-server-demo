<?php
namespace App\SellingBoard\Domain\Repositories;

interface CheckUserSellingRepositortyInterface{
    public function check($id):bool;
}
