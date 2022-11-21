<?php

namespace App\SellingBoard\Domain\Repositories;

use App\SellingBoard\Domain\Entities\Selling;
use Illuminate\Support\Facades\Auth;

class CreateSellingBoardRepository implements CreateSellingBoardRepositoryInterface
{
    public function create($data): bool
    {
        $board = Selling::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'email' => Auth::user()->email,
            'user_nickname' => Auth::user()->user_nickname,
            'views' => 1,
        ]);
        \Log::info('this data is '.$board);

        if ($board) {
            return true;
        } else {
            return false;
        }
    }
}

