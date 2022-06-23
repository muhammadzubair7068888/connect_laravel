<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Velocity extends Model
{
    use HasFactory;
    protected $table = "velocities";

    public function user_velocity()
    {
        return $this->hasMany(UserVelocity::class);
    }
}
