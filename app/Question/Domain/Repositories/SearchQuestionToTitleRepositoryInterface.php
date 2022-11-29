<?php

namespace App\Question\Domain\Repositories;


interface SearchQuestionToTitleRepositoryInterface
{
    /**
     * @param $search_content 검색 내용, 혹은 닉네임
     * @return bool
     */
    function search($search_content): object;
}
