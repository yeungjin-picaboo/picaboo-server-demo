<?php

namespace App\Community\Domain\Repositories;

interface ShowPaginateCommunityRepositoryInterface
{
    /**
     * @return bool
     */
    public function showPage($page): object;
}
