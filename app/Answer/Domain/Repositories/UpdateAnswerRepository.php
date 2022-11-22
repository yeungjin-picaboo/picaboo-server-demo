<?php

namespace App\Answer\Domain\Repositories;

use App\Answer\Domain\Entities\Answer;


class UpdateAnswerRepository implements UpdateAnswerRepositoryInterface
{
    public function update($Answer_num, $modified_content):bool
    {
        \Log::info($modified_content);
        if (Answer::where('Answer_num', $Answer_num)->exists()) {
            Answer::where('Answer_num', $Answer_num)
                ->update(
                    $modified_content->all()
                );
            return true;
        } else {
            return false;
        }
    }
}
