<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';
    protected $guard = 'admin';
    protected $fillable = [
        'question',
        'type',
        'order',
        'status',
        'created_at',
        'updated_at',
    ];

    public function get_question_answers()
    {
        return $this->hasMany(QuestionsAnswers::class, 'question_id')->orderBy('answer', 'ASC');
    }
}