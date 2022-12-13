<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
     protected $table = 'categories';

    protected $fillable=['title', 'description'];


    public static function getAllTopic(){
        return  Category::orderBy('id','DESC')->with('title')->paginate(10);
    }

    public function attendances(){
        return $this->hasMany(Attendance::class, 'category_id');
    }


    public function course(){
        return $this->belongsTo('App\AllCourse','id');
    }
}
