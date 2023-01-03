<?php
namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;


class CheckUserSellingRepository implements CheckUserSellingRepositoryInterface{
    public function check($selling_num): bool
    {

        $nowUser = Community::where('communities_num',$selling_num);

        if($nowUser->exists()){
            if(\Auth::user()->user_nickname !== $nowUser->value('writer')){

                return false;
            }
        };
        return true;
    }
}
