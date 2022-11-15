<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    use HasFactory;
    public function user(){ //TODO user 테이블과 1:N관계
        return $this -> belongsTo(User::class);
    }
    protected $table = 'sellings';
    protected $primaryKey = 'selling_num';
}
