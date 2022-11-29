<?php

namespace App\Comment\Domain\Repositories;

use App\Comment\Domain\Entities\Comment;


class UpdateCommentRepository implements UpdateCommentRepositoryInterface
{
    public function edited($comment_num, $edited)
    {

        if (Comment::where('comment_num', $comment_num)->exists()) {
            Comment::where('comment_num', $comment_num)
                ->update(
                    $edited->all()
                );
            return true;
        } else {
            return false;
        }
    }
}
