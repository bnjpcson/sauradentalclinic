<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medhistory extends Model
{
    use HasFactory;
    protected $table = "medhistory";
    protected $fillable = [
        'user_id',
        'question_id',
        'yes',
        'notes',
    ];
}
