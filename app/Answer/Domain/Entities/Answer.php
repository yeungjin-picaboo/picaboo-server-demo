<?php


namespace App\Answer\Domain\Entities;

use App\Models\User;
use App\Question\Domain\Entities\Question;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $table = 'answers';

    use HasFactory;

    public function user()
    { //TODO user 테이블과 1:N관계
        return $this->belongsTo(User::class);
    }

    public function question()
    { //TODO question 테이블과 1:N관계
        return $this->belongsTo(Question::class);
    }

    protected $primaryKey = 'answer_num';

    protected $fillable = [
        'user_nickname',
        'email',
        'answer',
        'question_num'
    ];

    protected $guarded = [
      'created_at',
      'updated_at'
    ];

}
