<?php

namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;
use Illuminate\Support\Facades\DB;


class ViewCommunityRepository implements ViewCommunityRepositoryInterface
{
    public function view($id): object
    {

        DB::table('communities')
            ->where('communities_num', $id)
            ->increment('views');

        $post = Community::where('communities_num', "$id")
            ->get();

        return $post;
    }
}
