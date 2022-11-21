<?php

namespace App\SellingBoard\Domain\Repositories;


interface EditSellingBoardRepositoryInterface{
    public function edited($selling_num,$edited);
}
