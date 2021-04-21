<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table='students';
    protected $fillable=['user_id','reg_no','course_id'];
   
    public function user(){
    	return $this->hasOne('App\Models\User', 'id','user_id');
    }

      public function course(){
    	return $this->hasMany('App\Models\Course', 'id','course_id');
    }
        
}
