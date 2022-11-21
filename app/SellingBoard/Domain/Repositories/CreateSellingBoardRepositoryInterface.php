<?php
namespace App\SellingBoard\Domain\Repositories;

interface CreateSellingBoardRepositoryInterface{
    public function create($data):bool;
}
