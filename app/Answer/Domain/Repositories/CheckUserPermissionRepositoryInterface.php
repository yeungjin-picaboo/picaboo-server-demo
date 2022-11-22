<?php

namespace App\Answer\Domain\Repositories;
//! 이 레포지토리는 관리자 페이지가 생성될때까지 개발x
interface CheckUserPermissionRepositoryInterface{
    public function checkPermission():bool;
}
