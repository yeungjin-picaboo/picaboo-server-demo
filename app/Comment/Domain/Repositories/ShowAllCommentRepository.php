<?php

namespace App\Comment\Domain\Repositories;

use Illuminate\Support\Facades\DB;


class ShowAllCommentRepository implements ShowAllCommentRepositoryInterface
{
    public function show($id): object
    {
        return DB::table('comments')
            ->where("communities_num","$id")->get();
    }
}

