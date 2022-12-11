<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static create(array $array)
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // hasOne (After create a user create Trainer, Parent, Trainee with user_id)

    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    public function trainee()
    {
        return $this->hasOne(Trainee::class);
    }

    public function trainin()
    {
        return $this->hasOne(Training::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function attendances()
    {
        return $this->hasOne(Attendance::class, 'trainee_id','trainer_id');
    }
}
