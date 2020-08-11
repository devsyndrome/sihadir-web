<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = [];  
    public $primaryKey = 'class_id';
    public function students()
    {
        return $this->hasMany('App\Students', 'class_id', 'class_id');
    }
}
