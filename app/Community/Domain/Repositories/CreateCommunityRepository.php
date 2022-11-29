<?php

namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;
use Illuminate\Support\Facades\Auth;

class CreateCommunityRepository implements CreateCommunityRepositoryInterface
{
    public function create($data): bool
    {
        \Log::info(Auth::user()->user_nickname);
        $board = Community::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'writer' => Auth::user()->user_nickname,
            'views' => 0,
        ]);


        if ($board) {
            return true;
        } else {
            return false;
        }
    }
}

