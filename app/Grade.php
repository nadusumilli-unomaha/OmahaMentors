<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=[
        'subject',
        'period',
        'actual',
        'comments',
        'student_id',
        'user_id',
    ];

    public function students()
    {
    	$this->belongsToMany('App\Student');
    }

    public function users()
    {
        $this->belongsToMany('App\User');
    }
}
