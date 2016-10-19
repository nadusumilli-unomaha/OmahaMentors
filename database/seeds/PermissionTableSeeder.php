<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_admin_0 = new Permission;
        $permission_admin_0->name = 'edit_employee';
        $permission_admin_0->description = 'The Admin can edit a employee in the system.';
        $permission_admin_0->save();

        $permission_admin_1 = new Permission;
        $permission_admin_1->name = 'edit_mentor';
        $permission_admin_1->description = 'The Admin can edit a mentor in the system.';
        $permission_admin_1->save();

        $permission_employee_0 = new Permission;
        $permission_employee_0->name = 'edit_employee_self';
        $permission_employee_0->description = 'The Employee can only edit himself in the system.';
        $permission_employee_0->save();

        $permission_mentor_0 = new Permission;
        $permission_mentor_0->name = 'edit_mentor_self';
        $permission_mentor_0->description = 'The Mentor can only edit himself in the system.';
        $permission_mentor_0->save();

        $permission_pending_0 = new Permission;
        $permission_pending_0->name = 'nothing';
        $permission_pending_0->description = 'This gives permissions to do nothing.';
        $permission_pending_0->save();
    }
}
