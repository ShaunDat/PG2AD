<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $int)
 */
class Trainee extends Model
{
    protected $fillable = [
         'course_id', 'roll_number', 'phone', 'age', 'gender', 'date_of_birth', 'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(AllCourse::class);
    }
}
