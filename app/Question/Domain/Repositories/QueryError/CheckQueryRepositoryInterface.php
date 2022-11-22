<?php
namespace App\Question\Domain\Repositories\QueryError;

interface CheckQueryRepositoryInterface{
    public function check($query):bool;
}
