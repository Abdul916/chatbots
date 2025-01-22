<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsAnswers extends Model
{
    use HasFactory;

    protected $table = 'questions_answers';
    protected $guard = 'admin';
    protected $fillable = [
        'question_id',
        'answer',
        'order',
        'status',
        'created_at',
        'updated_at',
        'is_deleted',
        'deleted_at',
    ];

    public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id');
    }
}