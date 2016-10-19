<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
    	return $this->belongsToMany('App\User','user_role','role_id','user_id');
    }

    public function permissions()
    {
    	return $this->belongsToMany('App\Permission','permission_role','role_id','permission_id');
    }
    
    public function assign(Permission $permission){
    	return $this->permissions()->save($permission);
    }
}
