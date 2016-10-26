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

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
