<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function user(){ //TODO user 테이블과 1:N관계
        return $this -> belongsTo(User::class);
    }
    public function answer(){ //TODO answer 테이블과 1:N관계
        return $this -> hasMany(Answer::class);
    }
    protected $table = 'questions';
    
    protected $primaryKey = 'question_num';
}
