<?php

namespace App\Community\Domain\Repositories;


use App\Community\Domain\Entities\Community;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Passport;

class ShowAllCommunityRepository implements ShowAllCommunityRepositoryInterface
{
    public function show(): object
    {
        $Community = DB::table('Communities')->get();
        return $Community;
    }
}

