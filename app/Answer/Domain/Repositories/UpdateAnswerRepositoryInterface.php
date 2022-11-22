<?php
namespace App\Answer\Domain\Repositories;

interface UpdateAnswerRepositoryInterface{
    function update($Answer_num,$modify_content):bool;
}
