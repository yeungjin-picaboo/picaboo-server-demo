<?php

namespace App\SellingBoard\Domain\Repositories;

use App\SellingBoard\Domain\Entities\Selling;


class UpdateSellingBoardRepository implements UpdateSellingBoardRepositoryInterface
{
    public function edited($selling_num, $edited)
    {
        \Log::info($edited);
        if (Selling::where('selling_num', $selling_num)->exists()) {
            Selling::where('selling_num', $selling_num)
                ->update(
                    $edited->all()
                );
            return true;
        } else {
            return false;
        }
    }
}
