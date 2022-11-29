<?php

namespace App\Community\Domain\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    public function community()
    {
        //Todo user 테이블과 1:N관계
        return $this->belongsTo(User::class);
    }

    protected $table = 'communities';


    protected $primaryKey = 'communities_num';

    protected $fillable = [
        'title',
        'content',
        'writer',
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
