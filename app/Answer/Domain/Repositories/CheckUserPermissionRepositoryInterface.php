<?php

namespace App\Answer\Domain\Repositories;

interface CheckUserPermissionRepositoryInterface{
    public function checkPermission():bool;
}
