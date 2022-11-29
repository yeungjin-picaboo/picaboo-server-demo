<?php

namespace App\Community\Domain\Repositories;


use App\Community\Domain\Entities\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

class SortCommunityToSortTypeRepository implements SortCommunityToSortTypeRepositoryInterface
{
    public function sort($sortType): object
    {

        $Community = DB::table('communities')
            ->orderBy($sortType)
            ->get()
        ;
        return $Community;
    }
}

