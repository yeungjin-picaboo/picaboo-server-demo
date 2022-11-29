<?php

namespace App\Comment\Domain\Repositories;


use App\Comment\Domain\Entities\Comment;
use Illuminate\Support\Facades\DB;


class ShowAllCommentRepository implements ShowAllCommentRepositoryInterface
{
    public function show($id): object
    {
//        $comment = Comment::where("communities_num", "2");
//        print_r($comment);
//        \Log::info($comment);
        \Log::info($id);
        return DB::table('comments')
            ->where("communities_num","$id")->get();
    }
}

