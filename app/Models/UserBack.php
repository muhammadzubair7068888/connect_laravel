<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Traits\ImageTrait;

class UserBack extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use Notifiable, ImageTrait, HasApiTokens;
    use ImageTrait {
        deleteImage as traitDeleteImage;
    }

    const BLOCK_UNBLOCK_EVENT = 1;
    const NEW_PRIVATE_CONVERSATION = 2;
    const ADDED_TO_GROUP = 3;
    const PRIVATE_MESSAGE_READ = 4;
    const MESSAGE_DELETED = 5;
    const MESSAGE_NOTIFICATION = 6;
    const CHAT_REQUEST = 7;
    const CHAT_REQUEST_ACCEPTED = 8;

    const PROFILE_UPDATES = 1;
    const STATUS_UPDATE = 2;
    const STATUS_CLEAR = 3;

    const FILTER_UNARCHIVE = 1;
    const FILTER_ARCHIVE = 2;
    const FILTER_ACTIVE = 3;
    const FILTER_INACTIVE = 4;
    const FILTER_ALL = 5;

    const FILTER_ARRAY = [
        self::FILTER_ALL => 'Select Status (ALL)',
        self::FILTER_UNARCHIVE => 'Unarchive',
        self::FILTER_ARCHIVE => 'Archive',
        self::FILTER_ACTIVE => 'Active',
        self::FILTER_INACTIVE => 'Inactive',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'dob',
        'avatar',
        'last_seen',
        'is_online',
        'about',
        'avatar',
        'activation_code',
        'is_active',
        'is_system',
        'email_verified_at',
        'player_id',
        'is_subscribed',
        'gender',
        'privacy',
    ];

    static $PATH = 'users';
    const HEIGHT = 250;
    const WIDTH = 250;

    const MALE = 1;
    const FEMALE = 2;
  //  protected $with = ['physical_assessment', 'mechanica_assessment', 'question'];
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
    public function velocities()
    {
        return $this->hasMany(Velocity::class);
    }
}
