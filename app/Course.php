<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Course extends Model
{
//    public function User(){
//        return $this->hasMany('App\User');
//    }
    protected $fillable = [
        'name', 'teacher'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
