<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=[
        'lastName',
        'firstName',
        'dob',
        'gender',
        'address',
        'city',
        'state',
        'zip',
        'email',
        'phone',
        'school',
        'user_id',
    ];

    public function users() {
        return $this->hasOne('App\User');
    }

    public function grades() {
        return $this->belongsToMany('App\Grade'); 
    }
    
    public function visits() {
        return $this->belongsToMany('App\Visit');
    }
}
