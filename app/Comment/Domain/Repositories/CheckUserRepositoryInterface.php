<?php
namespace App\Comment\Domain\Repositories;

interface CheckUserRepositoryInterface{
    public function check($id):bool;
}
