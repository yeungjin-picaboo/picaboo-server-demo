<?php
namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;


class CheckUserSellingRepository implements CheckUserSellingRepositoryInterface{
    public function check($selling_num): bool
    {
        \Log::info('num is'.$selling_num);
        $nowUser = Community::where('selling_num',$selling_num);
    \Log::info($nowUser->exists());
        if($nowUser->exists()){
            if(\Auth::user()->email !== $nowUser->value('email')){
                \Log::info('CheckUserSelling will be return false');
                return false;
            }
        };
        return true;
    }
}
