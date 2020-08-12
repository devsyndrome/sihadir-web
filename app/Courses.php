<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'course_id';
    public function schedules()
    {
        return $this->hasMany('App\Schedules', 'class_id', 'class_id');
    }
}
