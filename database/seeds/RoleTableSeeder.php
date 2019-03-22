<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->RoleSeeder();
    }

    public function RoleSeeder()
    {
        $create_users = Permission::where('slug', 'create-users')->first();
        $edit_users = Permission::where('slug', 'edit-users')->first();
        $view_users = Permission::where('slug', 'view-users')->first();
        $update_users = Permission::where('slug', 'update-users')->first();
        $delete_users = Permission::where('slug', 'delete-users')->first();

        $create_roles = Permission::where('slug', 'create-roles')->first();
        $edit_roles = Permission::where('slug', 'edit-roles')->first();
        $view_roles = Permission::where('slug', 'view-roles')->first();
        $update_roles = Permission::where('slug', 'update-roles')->first();
        $delete_roles = Permission::where('slug', 'delete-roles')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'superadmin';
        $dev_role->name = 'Superadmin Full Akses';
        $dev_role->save();
        //permison-user
        $dev_role->permissions()->attach($create_users);
        $dev_role->permissions()->attach($edit_users);
        $dev_role->permissions()->attach($view_users);
        $dev_role->permissions()->attach($update_users);
        $dev_role->permissions()->attach($delete_users);
        //permison-role
        $dev_role->permissions()->attach($create_roles);
        $dev_role->permissions()->attach($edit_roles);
        $dev_role->permissions()->attach($view_roles);
        $dev_role->permissions()->attach($update_roles);
        $dev_role->permissions()->attach($delete_roles);

        $manager_role = new Role();
        $manager_role->slug = 'Admin';
        $manager_role->name = 'Admin Creator';
        $manager_role->save();
        $manager_role->permissions()->attach($edit_users);
    }
}
