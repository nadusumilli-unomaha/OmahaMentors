<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=[
        'description',
    ];

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function students() {
        return $this->belongsTo('App\Student');
    }

    public function visits() {
        return $this->belongsTo('App\Visit');
    }
}
