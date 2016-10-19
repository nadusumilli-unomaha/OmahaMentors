<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_admin = Role::where('name','Admin')->first();
    	$role_employee = Role::where('name','Employee')->first();
    	$role_mentor = Role::where('name','Mentor')->first();
        $role_pending = Role::where('name','Pending')->first();

        $user = new User();
        $user->firstName = 'Admin';
        $user->lastName = 'Admin';
        $user->email = 'Admin@gmail.com';
        $user->password = bcrypt('Admin123');
        $user->address = '7595 woodsworth plaza apt 4';
        $user->city = 'Omaha';
        $user->state = 'NE';
        $user->zip = '68135'; 
        $user->phone = '4027776666';
        $user->role_request = 'Admin';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->firstName = 'Employee';
        $user->lastName = 'Employee';
        $user->email = 'Employee@gmail.com';
        $user->password = bcrypt('Employee123');
        $user->address = '7535 woodsworth plaza apt 4';
        $user->city = 'Omaha';
        $user->state = 'NE';
        $user->zip = '68135'; 
        $user->phone = '4027776666';
        $user->role_request = 'Employee';
        $user->save();
        $user->roles()->attach($role_employee);

        $user = new User();
        $user->firstName = 'Mentor';
        $user->lastName = 'Mentor';
        $user->email = 'Mentor@gmail.com';
        $user->password = bcrypt('Mentor123');
        $user->address = '7535 woodsworth plaza apt 4';
        $user->city = 'Omaha';
        $user->state = 'NE';
        $user->zip = '68135'; 
        $user->phone = '4027776666';
        $user->role_request = 'Mentor';
        $user->save();
        $user->roles()->attach($role_mentor);

        $user = new User();
        $user->firstName = 'Nikhit ';
        $user->lastName = 'Adusumilli';
        $user->email = 'nikhitadusumilli@gmail.com';
        $user->password = bcrypt('Tufluckfed1');
        $user->address = '7535 pierce plaza apt 4';
        $user->city = 'Omaha';
        $user->state = 'NE';
        $user->zip = '68124'; 
        $user->phone = '4029991276';
        $user->role_request = 'Mentor';
        $user->save();
        $user->roles()->attach($role_pending);
    }
}
