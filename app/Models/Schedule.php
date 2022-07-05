<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = "schedules";
    protected $fillable = [
        'exercise_id', 'start', 'end' , 'color'
    ];
    public function exercise()
    {
        return $this->belongsTo(Exercise::class, 'exercises_id','id');
    }

}
