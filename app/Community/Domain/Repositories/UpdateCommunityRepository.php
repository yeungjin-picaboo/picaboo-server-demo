<?php

namespace App\Community\Domain\Repositories;

use App\Community\Domain\Entities\Community;


class UpdateCommunityRepository implements UpdateCommunityRepositoryInterface
{
    public function edited($selling_num, $edited)
    {
        \Log::info($edited);
        if (Community::where('selling_num', $selling_num)->exists()) {
            Community::where('selling_num', $selling_num)
                ->update(
                    $edited->all()
                );
            return true;
        } else {
            return false;
        }
    }
}
