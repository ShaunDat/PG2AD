<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create()
 */
class Attendance extends Model
{
    protected $fillable = [
        'trainer_id', 'class_id', 'trainee_id', 'attendance_date', 'attendance_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'trainer_id');
    }

    public function userAsTrainee()
    {
        return $this->belongsTo(User::class, 'trainee_id');
    }

    /*public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }*/

    public function class()
    {
        return $this->belongsTo(AllClass::class);
    }

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
