<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generators extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'generator_id';
    public function schedules()
    {
        return $this->belongsTo('App\Schedules', 'schedule_id', 'schedule_id');
    }
    public function presences()
    {
        return $this->belongsTo('App\Presences', 'generator_id', 'generator_id');
    }
    
}
