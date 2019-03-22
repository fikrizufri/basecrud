<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->PermissionSeeder();
    }

    public function PermissionSeeder()
    {
        $superadmin = Role::where('slug', 'superadmin')->first();
        $admin = Role::where('slug', 'admin')->first();

        $createUsers = new Permission();
        $createUsers->slug = 'create-users';
        $createUsers->name = 'Create Users';
        $createUsers->task_id = 1;
        $createUsers->save();
        $createUsers->roles()->attach($superadmin);

        $viewUsers = new Permission();
        $viewUsers->slug = 'view-users';
        $viewUsers->name = 'View Users';
        $viewUsers->task_id = 1;
        $viewUsers->save();
        $viewUsers->roles()->attach($superadmin);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->task_id = 1;
        $editUsers->save();
        $editUsers->roles()->attach($admin);

        $createUsers = new Permission();
        $createUsers->slug = 'update-users';
        $createUsers->name = 'Update Users';
        $createUsers->task_id = 1;
        $createUsers->save();
        $createUsers->roles()->attach($superadmin);

        $editUsers = new Permission();
        $editUsers->slug = 'delete-users';
        $editUsers->name = 'Delete Users';
        $editUsers->task_id = 1;
        $editUsers->save();
        $editUsers->roles()->attach($admin);

        $createRoles = new Permission();
        $createRoles->slug = 'create-roles';
        $createRoles->name = 'Create roles';
        $createRoles->task_id = 2;
        $createRoles->save();
        $createRoles->roles()->attach($superadmin);
        
        $viewRoles = new Permission();
        $viewRoles->slug = 'view-roles';
        $viewRoles->name = 'View roles';
        $viewRoles->task_id = 2;
        $viewRoles->save();
        $viewRoles->roles()->attach($superadmin);

        $editRoles = new Permission();
        $editRoles->slug = 'edit-roles';
        $editRoles->name = 'Edit roles';
        $editRoles->task_id = 2;
        $editRoles->save();
        $editRoles->roles()->attach($superadmin);

        $updateRoles = new Permission();
        $updateRoles->slug = 'update-roles';
        $updateRoles->name = 'Update roles';
        $updateRoles->task_id = 2;
        $updateRoles->save();
        $updateRoles->roles()->attach($superadmin);

        $deleteRoles = new Permission();
        $deleteRoles->slug = 'delete-roles';
        $deleteRoles->name = 'Delete roles';
        $deleteRoles->task_id = 2;
        $deleteRoles->save();
        $deleteRoles->roles()->attach($superadmin);
    }
}
