<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechanicalAssessment extends Model
{
    use HasFactory;
    protected $table = "mechanical_assessments";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
