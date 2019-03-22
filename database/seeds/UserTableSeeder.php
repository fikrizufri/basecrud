<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->UserSeeder();
    }

    public function UserSeeder()
    {
        $superadmin_role = Role::where('slug', 'superadmin')->first();
        $admin_role = Role::where('slug', 'manager')->first();

        $create_users = Permission::where('slug', 'create-users')->first();
        $edit_users = Permission::where('slug', 'edit-users')->first();
        $update_users = Permission::where('slug', 'update-users')->first();
        $delete_users = Permission::where('slug', 'delete-users')->first();

        $create_roles = Permission::where('slug', 'create-roles')->first();
        $edit_roles = Permission::where('slug', 'edit-roles')->first();
        $update_roles = Permission::where('slug', 'update-roles')->first();
        $delete_roles = Permission::where('slug', 'delete-roles')->first();

        $superadmin = new User();
        $superadmin->name = 'Usama Muneer';
        $superadmin->email = 'usama@thewebtier.com';
        $superadmin->password = bcrypt('secret');
        $superadmin->save();
        
        //role-useradmin
        $superadmin->roles()->attach($superadmin_role);

        //user-permision
        $superadmin->permissions()->attach($create_users);
        $superadmin->permissions()->attach($edit_users);
        $superadmin->permissions()->attach($update_users);
        $superadmin->permissions()->attach($delete_users);

        $superadmin->permissions()->attach($create_roles);
        $superadmin->permissions()->attach($edit_roles);
        $superadmin->permissions()->attach($update_roles);
        $superadmin->permissions()->attach($delete_roles);


        $manager = new User();
        $manager->name = 'Asad Butt';
        $manager->email = 'asad@thewebtier.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($admin_role);
        $manager->permissions()->attach($edit_users);
    }
}
