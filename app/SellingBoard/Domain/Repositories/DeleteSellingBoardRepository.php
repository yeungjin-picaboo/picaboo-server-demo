<?php

namespace App\SellingBoard\Domain\Repositories;

use App\SellingBoard\Domain\Entities\Selling;

class DeleteSellingBoardRepository implements DeleteSellingBoardRepositoryInterface{

    public function delete($selling_num):bool{
        if(Selling::where('selling_num',$selling_num)->exists()){
            $deleteSell = Selling::find($selling_num);
            $deleteSell->delete();
            return true;
        }else{
            return false;
        }

    }
}
