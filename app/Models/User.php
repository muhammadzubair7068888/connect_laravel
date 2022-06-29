<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
  //  protected $with = ['physical_assessment', 'mechanica_assessment', 'question'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dob',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function uservelocity(){
        return $this->hasMany(UserVelocity::class);
    }
    public function scopeWithUser($query)
    {
        $query->with('physical_assessment');
        $query->with('mechanical_assessment');
        $query->with('question');
    }
    public function physical_assessment()
    {
        return $this->hasMany(PhysicalAssessment::class);
    }
    public function mechanical_assessment()
    {
        return $this->hasMany(MechanicalAssessment::class);
    }
    public function question()
    {
        return $this->hasMany(Questionnaire::class);
    }
}