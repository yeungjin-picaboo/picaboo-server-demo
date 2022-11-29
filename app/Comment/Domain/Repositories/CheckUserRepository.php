<?php

namespace App\Comment\Domain\Repositories;

use App\Comment\Domain\Entities\Comment;
use App\Community\Domain\Entities\Community;


class CheckUserRepository implements CheckUserRepositoryInterface
{
    public function check($id): bool
    {

        $nowUser = Comment::where('communities_num', $id);

        if ($nowUser->exists()) {
            if (\Auth::user()->user_nickname !== $nowUser->value('writer')) {
                return false;
            }
        };
        return true;
    }
}
