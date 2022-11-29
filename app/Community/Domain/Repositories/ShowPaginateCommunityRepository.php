<?php

namespace App\Community\Domain\Repositories;


use App\Community\Domain\Entities\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

class ShowPaginateCommunityRepository implements ShowPaginateCommunityRepositoryInterface
{
    public function showPage($page): object
    {

        $Community = DB::table('communities')
            ->skip(12 * ($page - 1))
            ->take(12)
            ->get()
        ;
        return $Community;
    }
}

