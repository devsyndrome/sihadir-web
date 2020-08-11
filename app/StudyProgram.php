<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyProgram extends Model
{
    protected $table = 'programstudies';
    protected $guarded = [];  
    public $primaryKey = 'prody_id';
    public function students()
    {
        return $this->hasMany('App\Classes', 'prody_id', 'prody_id');
    }
}
