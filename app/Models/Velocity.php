<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Velocity extends Model
{
    use HasFactory;
    protected $table = "velocities";
    protected $fillable = [
        'admin_id',
        'name',
        'key',
        'label',
        'status',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class,'admin_id');
    }
    public function user_velocity()
    {
        return $this->hasMany(UserVelocity::class);
    }
}
