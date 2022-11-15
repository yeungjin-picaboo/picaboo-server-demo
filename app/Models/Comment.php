<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'commnets';
    protected $primaryKey = 'comment_num';
    public function user(){ //TODO user 테이블과 1:N관계
        return $this -> belongsTo(User::class);
    }
}
