<?php
namespace App\Community\Domain\Repositories;

interface CreateCommunityRepositoryInterface{
    public function create($data):bool;
}
