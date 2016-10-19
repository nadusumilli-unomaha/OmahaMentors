<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_admin_0 = Permission::where('name','edit_employee')->first();
        $permission_admin_1 = Permission::where('name','edit_mentor')->first();
        $permission_employee_0 = Permission::where('name','edit_employee_self')->first();
        $permission_mentor_0 = Permission::where('name','edit_mentor_self')->first();
        $permission_pending_0 = Permission::where('name','nothing')->first();

        $role_admin = new Role;
        $role_admin->name = 'Admin';
        $role_admin->description = 'The Admin of the system.';
        $role_admin->save();
        $role_admin->permissions()->attach($permission_admin_0);
        $role_admin->permissions()->attach($permission_admin_1);

        $role_employee = new Role;
        $role_employee->name = 'Employee';
        $role_employee->description = 'The Employee of the system.';
        $role_employee->save();
        $role_employee->permissions()->attach($permission_employee_0);

        $role_mentor = new Role;
        $role_mentor->name = 'Mentor';
        $role_mentor->description = 'The Mentor of the system.';
        $role_mentor->save();
        $role_mentor->permissions()->attach($permission_mentor_0);

        $role_pending = new Role;
        $role_pending->name = 'Pending';
        $role_pending->description = 'The Status Pending message.';
        $role_pending->save();
        $role_pending->permissions()->attach($permission_pending_0);
    }
}
