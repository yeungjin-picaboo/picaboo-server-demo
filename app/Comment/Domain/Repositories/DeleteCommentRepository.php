<?php

namespace App\Comment\Domain\Repositories;

use App\Comment\Domain\Entities\Comment;
use Illuminate\Support\Facades\DB;

class DeleteCommentRepository implements DeleteCommentRepositoryInterface
{

    public function delete($id): bool
    {

            \Log::info("Logi id is $id");
        //
        if (Comment::where('comment_num', $id)->exists()) {
            $deleteSell = Comment::find($id);
//            \Log::info(var_export($deleteSell->comment_num));
            $communities_num = $deleteSell->communities_num;
            var_export($communities_num);
            $deleteSell->delete();

            DB::table('communities')
                ->where('communities_num', $communities_num)
                ->decrement('reply_count');
            \Log::info("the Log is ,$communities_num");

            return true;
        } else {
            return false;
        }

    }
}
