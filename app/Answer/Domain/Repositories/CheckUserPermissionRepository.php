<?php
//! 이 레포지토리는 관리자 페이지가 생성될때까지 개발x
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
