<?php

namespace App\Question\Domain\Repositories;

use App\Question\Domain\Entities\Question;


class UpdateQuestionRepository implements UpdateQuestionRepositoryInterface
{
    public function update($question_num, $modified_content):bool
    {

        if (Question::where('question_num', $question_num)->exists()) {
            Question::where('question_num', $question_num)
                ->update(
                    $modified_content->all()
                );
            return true;
        } else {
            return false;
        }
    }
}
