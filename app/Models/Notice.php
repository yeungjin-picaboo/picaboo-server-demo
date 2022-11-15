<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $table = 'notices';
    protected $primaryKey = 'notice_num';
    public function user(){ //TODO user 테이블과 1:N관계
        return $this -> belongsTo(User::class);
    }

    protected $guarded = [ //TODO 대량할당 불가능, 임의 수정 불가능
        'permission',
        'created_at',
        'updated_at'
    ];
}
