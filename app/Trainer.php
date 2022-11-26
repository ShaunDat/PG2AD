<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    protected $fillable = ['phone', 'subject', 'address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function trainee()
    {
        return $this->hasOne(Trainee::class);
    }

    public function class()
    {
        return $this->belongsTo(AllClass::class);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
