<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'sorting'
    ];

    public function answers($id, $uid)
    {
        return $this->hasMany(Answer::class)
            ->where('user_id', $uid)
            ->where('question_id', $id)
            ;
    }
}
