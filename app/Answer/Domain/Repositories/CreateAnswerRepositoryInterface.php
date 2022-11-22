<?php
namespace App\Answer\Domain\Repositories;

/**
 * @param array $data = Action클래스에서 request받은 정보를 vaildation해서 유효성 확인후 data객체 혹은
 *                      response그대로 받아와서 사용하는 배열
 */
interface CreateAnswerRepositoryInterface{
    public function create($data):bool;
}
