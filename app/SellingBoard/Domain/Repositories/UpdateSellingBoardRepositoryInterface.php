<?php

namespace App\SellingBoard\Domain\Repositories;


interface UpdateSellingBoardRepositoryInterface{
    public function edited($selling_num,$edited);
}
