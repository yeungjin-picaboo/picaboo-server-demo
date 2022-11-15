<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function answer(){ //TODO answer 테이블과 1:N관계
        return $this -> hasMany(Answer::class);
    }
    public function selling(){  //TODO selling 테이블과 1:N관계
        return $this -> hasMany(Selling::class);
    }
    public function question(){  //TODO question 테이블과 1:N관계
        return $this -> hasMany(Question::class);
    }
    public function notice(){  //TODO notice 테이블과 1:N관계
        return $this -> hasMany(Notice::class);
    }
    public function comment(){  //TODO notice 테이블과 1:N관계
        return $this -> hasMany(Comment::class);
    }


    protected $primaryKey = 'user_id'; //* 기본적으론 id가 기본키로 잡힘
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = [
        'user_id',
        'password',
        'name',
        'user_nickname',
    ];

    protected $guarded = [ // 대량할당 불가능, 임의 수정 불가능
        'permission',
        'created_at',
        'updated_at'
    ];
}
