<?php

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->TaskSeeder();
    }

    public function TaskSeeder()
    {
        $dashboard = new Task();
        $dashboard->title = 'Dashboard';
        $dashboard->slug = str_slug($dashboard->title);
        $dashboard->description = 'Manajemen Dashboard';
        $dashboard->save();

        $task = new Task();
        $task->title = 'User';
        $task->slug = str_slug($task->title);
        $task->description = 'Manajemen User';
        $task->save();

        $taskRole = new Task();
        $taskRole->title = 'Roles';
        $taskRole->slug = str_slug($taskRole->title);
        $taskRole->description = 'Manajemen Hak Akses';
        $taskRole->save();

        $taskRole = new Task();
        $taskRole->title = 'Tasks';
        $taskRole->slug = str_slug($taskRole->title);
        $taskRole->description = 'Manajemen Hak Modul';
        $taskRole->save();

        $taskRole = new Task();
        $taskRole->title = 'Menu';
        $taskRole->slug = str_slug($taskRole->title);
        $taskRole->description = 'Manajemen Menu';
        $taskRole->save();
    }
}
