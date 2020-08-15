<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'schedule_id';
    public function classes()
    {
        return $this->belongsTo('App\Classes', 'class_id', 'class_id');
    }
    public function courses()
    {
        return $this->belongsTo('App\Courses', 'course_id', 'course_id');
    }
    public function classrooms()
    {
        return $this->belongsTo('App\Classrooms', 'classroom_id', 'classroom_id');
    }
    public function lecturers()
    {
        return $this->belongsTo('App\Lecturers', 'lecturer_id', 'lecturer_id');
    }
    public function generators()
    {
        return $this->hasMany('App\Generators', 'schedule_id', 'schedule_id');
    }
}
