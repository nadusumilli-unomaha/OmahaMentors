<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable=[
        'check',
        'Date',
        'user_id',
        'student_id',
    ];

    public function students() {
        return $this->belongsToMany('App\Student');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
