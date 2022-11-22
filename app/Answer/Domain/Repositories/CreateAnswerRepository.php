<?php

namespace App\Answer\Domain\Repositories;


use App\Answer\Domain\Entities\Answer;
use Illuminate\Support\Facades\Auth;

//맨 처음 글을 작성하는것
class CreateAnswerRepository implements CreateAnswerRepositoryInterface
{
    public function create($data): bool
    {
        $isExist = Answer::where('question_num',$data['question_num'])->exists();
        //question_num에 글이 있는가 검사

        if($isExist){}
        $answer = Answer::create([
            'answer' => $data['answer'],
            'user_nickname' => Auth::user()->user_nickname,
            'question_num' => $data['question_num'],

        ]);
        \Log::info('this data is '.$answer);

        if ($answer) {
            return true;
        } else {
            return false;
        }
    }
}

