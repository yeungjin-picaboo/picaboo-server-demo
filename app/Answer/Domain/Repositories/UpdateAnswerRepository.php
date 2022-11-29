<?php

namespace App\Answer\Domain\Repositories;

use App\Answer\Domain\Entities\Answer;


class UpdateAnswerRepository implements UpdateAnswerRepositoryInterface
{
    public function update($answer_num, $modified_content):bool
    {
        $search_user = Answer::where('answer_num', $answer_num);

        if ($search_user->exists()) {
            $search_user
                ->update(
                    $modified_content->all()
                );
            return true;
        } else {
            return false;
        }
    }
}
