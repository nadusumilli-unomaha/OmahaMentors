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
        return $this->belongsTo('App\User');
    }

    public function grades() {
        return $this->hasMany('App\Grade'); 
    }
    
    public function visits() {
        return $this->hasMany('App\Visit');
    }
}
