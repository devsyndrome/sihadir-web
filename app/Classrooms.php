<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'classroom_id';
    public function schedules()
    {
        return $this->hasMany('App\Schedules', 'class_id', 'class_id');
    }
}
