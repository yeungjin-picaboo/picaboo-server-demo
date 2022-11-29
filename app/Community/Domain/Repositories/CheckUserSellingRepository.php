<?php
namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;


class CheckUserSellingRepository implements CheckUserSellingRepositoryInterface{
    public function check($selling_num): bool
    {

        $nowUser = Community::where('selling_num',$selling_num);

        if($nowUser->exists()){
            if(\Auth::user()->email !== $nowUser->value('email')){

                return false;
            }
        };
        return true;
    }
}
