<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presences extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'presence_id';
    public function generators()
    {
        return $this->belongsTo('App\Generators', 'generator_id', 'generator_id');
    }
    public function students()
    {
        return $this->belongsTo('App\Students', 'student_id', 'student_id');
    }
}
