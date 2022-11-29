<?php


namespace App\Community\Domain\Repositories;

interface SortCommunityToSortTypeRepositoryInterface
{
    /**
     * @return bool
     */
    public function sort($sortType): object;
}
