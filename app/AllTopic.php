<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $all)
 * @method static latest()
 */
class AllTopic extends Model
{
    protected $table = 'topics';

    protected $fillable = ['name', 'note'];

}
