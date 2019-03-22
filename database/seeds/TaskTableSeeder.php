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
        $task = new Task();
        $task->title = 'Kelola User';
        $task->descption = 'Manajemen User';
        $task->save(); 

        $task = new Task();
        $task->title = 'Kelola Hak Akses';
        $task->descption = 'Manajemen Hak Akses';
        $task->save(); 
    }
}
