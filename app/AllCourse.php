<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static latest()
 */
class AllCourse extends Model
{
    protected $table = 'courses';

    protected $fillable = ['name', 'note'];

    public function attendances(){
        return $this->hasMany(Attendance::class, 'course_id');
    }
}
