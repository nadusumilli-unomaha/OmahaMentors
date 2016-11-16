<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable=[
        'check',
        'Date',
    ];

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    
    public function notes() {
        return $this->hasMany('App\Note');
    }
}
