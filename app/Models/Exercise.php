<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    protected $table= 'exercises';

    public function exercise_type()
    {
        return $this->belongsTo(ExerciseType::class, 'exercises_type_id');
    }
    public function excercise_detail()
    {
        return $this->hasMany(ExerciseDetail::class);
    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
