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
        $superadmin = new Role();
        $superadmin->name = 'Superadmin';
        $superadmin->slug = 'superadmin';
        $superadmin->save();
        
        $adminRole = new Role();
        $adminRole->name = 'Admin';
        $adminRole->slug = 'admin';
        $adminRole->save();

        $managerRole = new Role();
        $managerRole->name = 'Manager';
        $managerRole->slug = 'manager';
        $managerRole->save();
    }
}
