<?php

namespace App\SellingBoard\Domain\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class
Selling extends Model
{
    use HasFactory;

    public function selling()
    {
        //Todo user 테이블과 1:N관계
        return $this->belongsTo(User::class);
    }

    protected $table = 'sellings';


    protected $primaryKey = 'selling_num';

    protected $fillable = [
        'title',
        'content',
        'email',
        'user_nickname',
        'views',
    ];

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'user_id',
    ];
}
