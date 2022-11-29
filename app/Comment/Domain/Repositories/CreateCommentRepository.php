<?php

namespace App\Comment\Domain\Repositories;

use App\Comment\Domain\Entities\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreateCommentRepository implements CreateCommentRepositoryInterface
{
    public function create($data): bool
    {

        $board = Comment::create([
            'communities_num' => $data['page_id'],
            'comment' => $data['comment'],
            'writer' => Auth::user()->user_nickname,
        ]);
        DB::table('communities')
            ->where('communities_num',$data['page_id'])
            ->increment('reply_count');

        if ($board) {
            return true;
        } else {
            return false;
        }
    }
}

