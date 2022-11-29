<?php

namespace App\Question\Domain\Repositories;

interface ShowPaginateQuestionRepositoryInterface
{
    /**
     * @return bool
     */
    public function showPage($page): object;
}
