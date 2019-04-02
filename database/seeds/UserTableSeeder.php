<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Task;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->userSeeder();
    }

    public function userSeeder()
    {
        $superadmin = Role::where('slug', 'superadmin')->first();
        $adminRole = Role::where('slug', 'admin')->first();

        $superadminUser = new User();
        $superadminUser->name = 'Superadmin';
        $superadminUser->slug = str_slug('Superadmin');
        $superadminUser->email = 'Superadmin@admin.com';
        $superadminUser->password = bcrypt('secret');
        $superadminUser->icon = 'default-icon.png';
        $superadminUser->save();

        $superadminUser->roles()->attach($superadmin);
    
        $admin = new User();
        $admin->name = 'admin';
        $admin->slug = str_slug('admin');
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('secret');
        $admin->icon = 'default-icon.png';
        $admin->save();

        $admin->roles()->attach($adminRole);
    }
}
