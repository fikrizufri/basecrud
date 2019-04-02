<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->SeederMenu();
    }

    public function SeederMenu()
    {
        $dashboard = new Menu();
        $dashboard->name = 'Dashboard';
        $dashboard->slug = 'dashboard';
        $dashboard->url = '/';
        $dashboard->class = 'fas fa-fw fa-tachometer-alt';
        $dashboard->position = 0;
        $dashboard->group_id = 1;
        $dashboard->active = 'Y';
        $dashboard->target = '_self';
        $dashboard->save();

        $hakases = new Menu();
        $hakases->name = 'Hak Akses';
        $hakases->slug = str_slug($hakases->name);
        $hakases->url = 'permission';
        $hakases->class = 'fas fa-user-circle';
        $hakases->position = 0;
        $hakases->group_id = 1;
        $hakases->active = 'Y';
        $hakases->target = '_self';
        $hakases->save();

        $menu = new Menu();
        $menu->name = 'Menu';
        $menu->slug = str_slug($menu->name);
        $menu->url = 'menu';
        $menu->class = 'fas fa-bars';
        $menu->position = 0;
        $menu->group_id = 1;
        $menu->active = 'Y';
        $menu->target = '_self';
        $menu->save();

        $modul = new menu();
        $modul->name = 'Modul';
        $modul->slug = str_slug($modul->name);
        $modul->url = 'task';
        $modul->class = 'fas fa-tasks';
        $modul->position = 0;
        $modul->group_id = 1;
        $modul->active = 'Y';
        $modul->target = '_self';
        $modul->save();

        $user = new menu();
        $user->name = 'User';
        $user->slug = str_slug($user->name);
        $user->url = 'user';
        $user->class = 'fa fa-user';
        $user->position = 0;
        $user->group_id = 1;
        $user->active = 'Y';
        $user->target = '_self';
        $user->save();
    }
}
