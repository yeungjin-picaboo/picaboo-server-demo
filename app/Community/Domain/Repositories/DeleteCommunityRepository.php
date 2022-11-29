<?php

namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;

class DeleteCommunityRepository implements DeleteCommunityRepositoryInterface{

    public function delete($selling_num):bool{
        if(Community::where('selling_num',$selling_num)->exists()){
            $deleteSell = Community::find($selling_num);
            $deleteSell->delete();
            return true;
        }else{
            return false;
        }

    }
}
