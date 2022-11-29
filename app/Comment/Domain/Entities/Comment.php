<?php

namespace App\Comment\Domain\Entities;

use App\Community\Domain\Entities\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

//    public function comment()
//    {
//        return $this->belongsTo(User::class);
//
//    }

    protected $table = 'comments';

    protected $primaryKey = "comment_num";

    protected $fillable = [
        'communities_num',
        'writer',
        'comment'
    ];
}
