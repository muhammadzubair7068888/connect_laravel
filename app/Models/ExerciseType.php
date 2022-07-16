<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    use HasFactory;
    protected $table = "exercises_types";
    public function excercise()
    {
        return $this->hasMany(Exercise::class);
    }

}
