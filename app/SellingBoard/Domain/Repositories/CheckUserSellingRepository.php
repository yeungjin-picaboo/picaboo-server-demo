<?php
namespace App\SellingBoard\Domain\Repositories;

use App\SellingBoard\Domain\Entities\Selling;


class CheckUserSellingRepository implements CheckUserSellingRepositortyInterface{
    public function check($selling_num): bool
    {
//        \Log::info('num is'.$selling_num);
        $nowUser = Selling::where('selling_num',$selling_num);

        if($nowUser->exists()){
            if(\Auth::user()->email !== $nowUser->value('email')){
                return false;
            }
        };
        return true;
    }
}
