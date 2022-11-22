<?php

namespace App\Answer\Domain\Repositories;

class CheckUserPermissionRepository implements CheckUserPermissionRepositoryInterface
{
    public function checkPermission(): bool // 유저가 작성한 글이 맞는지 확인하는 클래스
    {
        if(\Auth::user()->pemission !== 1){
            return false;
        }

        return true;
    }
}
