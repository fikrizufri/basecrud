<?php

use Illuminate\Database\Seeder;
use App\Models\MenuGroup;

class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->GroupSeeder();
    }

    public function GroupSeeder()
    {
        $dashboard = new MenuGroup();
        $dashboard->name = 'Dashboard';
        $dashboard->save();
    }
}
