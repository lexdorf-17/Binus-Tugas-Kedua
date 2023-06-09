<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'name',
        'score_quiz',
        'score_assignment',
        'score_absent',
        'score_practice',
        'score_test',
        'grade',
    ];
}
