<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'email',
        'password',
        'lastName',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'role_request'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'firstname' => 'string',
        'email' => 'string',
        'lastName' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
    ];

    //These are the relationship defenitions for the Models.
    //These are how eloquent qeries for relationships.
    public function roles()
    {
        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }
    
    public function students() {
        return $this->hasMany('App\Student');
    }

    public function visits() {
        return $this->hasMany('App\Visit');
    }

    //##################################################################
    //# Helper functions to create a role based login and assignments. #
    //##################################################################
    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                    return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

    public function getRole()
    {
        return $this->roles();
    }

    public function assign($role)
    {
        return $this->roles()->save($role);
    }

    //#####################################################################
    //# The end of Helper functions for role based login and assignments. #
    //#####################################################################
}
