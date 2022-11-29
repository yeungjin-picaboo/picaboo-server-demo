<?php
namespace App\Comment\Domain\Repositories;

interface ShowAllCommentRepositoryInterface{
    /**
     * @param $id id
     * @return object
     */
    public function show($id):object;
}
