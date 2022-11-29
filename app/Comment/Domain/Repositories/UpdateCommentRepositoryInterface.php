<?php

namespace App\Comment\Domain\Repositories;


interface UpdateCommentRepositoryInterface{
    public function edited($selling_num,$edited);
}
