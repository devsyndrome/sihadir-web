<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'lecturer_id';
    public function schedules()
    {
        return $this->hasMany('App\Schedules', 'class_id', 'class_id');
    }
}