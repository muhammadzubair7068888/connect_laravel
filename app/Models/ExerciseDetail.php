<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseDetail extends Model
{
    use HasFactory;
    protected $table = "exercises_details";

    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercise_id');
    }
}
