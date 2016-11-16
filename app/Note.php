<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=[
        'description',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function visit() {
        return $this->belongsTo('App\Visit');
    }
}
