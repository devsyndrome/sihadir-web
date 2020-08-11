<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'student_id';
    public function classes()
    {
        return $this->belongsTo('App\Classes', 'class_id', 'class_id');
    }
    
}
