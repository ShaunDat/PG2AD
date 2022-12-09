<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    protected $fillable = ['topic_id','phone','gender','date_of_birth','address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function trainee()
    {
        return $this->hasOne(Trainee::class);
    }
    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }


    public function topics()
    {
        return $this->belongsTo('App\AllTopic', 'topic_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
