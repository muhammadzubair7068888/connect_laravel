<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVelocity extends Model
{
    use HasFactory;
    protected $table = "user_velocities";
    public function velocity_type()
    {
        return $this->belongsTo(Velocity::class,'velocity_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
