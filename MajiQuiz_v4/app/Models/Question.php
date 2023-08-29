<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // use HasFactory;

    // tabela questions nao tem timestamps (created_at, etc.)
    // sem esta linha, metodo store() no AdminController da erro porque laravel pressupoe por defeito que colunas timestamp existem
    public $timestamps = false;

    protected $fillable = [
        'category',
        'difficulty',
        'question',
        'correct_answer',
        'incorrect_answer1',
        'incorrect_answer2',
        'incorrect_answer3'
    ];
}
