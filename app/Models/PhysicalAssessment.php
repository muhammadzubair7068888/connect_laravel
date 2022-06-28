<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalAssessment extends Model
{
    use HasFactory;
    protected $table = 'physical_assessments';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
