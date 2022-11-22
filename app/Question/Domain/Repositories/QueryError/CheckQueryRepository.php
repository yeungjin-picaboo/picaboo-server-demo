<?php

namespace App\Question\Domain\Repositories\QueryError;

use App\Question\Domain\Entities\Question;
use Illuminate\Database\QueryException;

class CheckQueryRepository implements CheckQueryRepositoryInterface
{
    public function check($query): bool // 유저가 작성한 글이 맞는지 확인하는 클래스
    {

    }
}
