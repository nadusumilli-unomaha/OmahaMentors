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
    ];


    public function student() {
        return $this->belongsTo('App\Student');
    }
}
