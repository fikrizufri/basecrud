<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Task;

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

        $user = Task::where('slug', 'user')->first();
        $hakases = Task::where('slug', 'roles')->first();
        $task = Task::where('slug', 'tasks')->first();
        $menu = Task::where('slug', 'menu')->first();

        $createUsers = new Permission();
        $createUsers->slug = 'create-user';
        $createUsers->name = 'Create User';
        $createUsers->task_id = $user->id;
        $createUsers->save();
        $createUsers->roles()->attach($superadmin);
        $createUsers->roles()->attach($admin);

        $viewUsers = new Permission();
        $viewUsers->slug = 'view-user';
        $viewUsers->name = 'View User';
        $viewUsers->task_id = $user->id;
        $viewUsers->save();
        $viewUsers->roles()->attach($superadmin);
        $viewUsers->roles()->attach($admin);

        $editUsers = new Permission();
        $editUsers->slug = 'edit-user';
        $editUsers->name = 'Edit User';
        $editUsers->task_id = $user->id;
        $editUsers->save();
        $editUsers->roles()->attach($superadmin);
        $editUsers->roles()->attach($admin);

        $createUsers = new Permission();
        $createUsers->slug = 'update-user';
        $createUsers->name = 'Update User';
        $createUsers->task_id = $user->id;
        $createUsers->save();
        $createUsers->roles()->attach($superadmin);
        $createUsers->roles()->attach($admin);

        $editUsers = new Permission();
        $editUsers->slug = 'delete-user';
        $editUsers->name = 'Delete User';
        $editUsers->task_id = $user->id;
        $editUsers->save();
        $editUsers->roles()->attach($superadmin);
        $editUsers->roles()->attach($admin);

        $createRoles = new Permission();
        $createRoles->slug = 'create-hak-akses';
        $createRoles->name = 'Create hak-akses';
        $createRoles->task_id = $hakases->id;
        $createRoles->save();
        $createRoles->roles()->attach($superadmin);
        $createRoles->roles()->attach($admin);
        
        $viewRoles = new Permission();
        $viewRoles->slug = 'view-hak-akses';
        $viewRoles->name = 'View hak-akses';
        $viewRoles->task_id = $hakases->id;
        $viewRoles->save();
        $viewRoles->roles()->attach($superadmin);
        $viewRoles->roles()->attach($admin);

        $editRoles = new Permission();
        $editRoles->slug = 'edit-hak-akses';
        $editRoles->name = 'Edit hak-akses';
        $editRoles->task_id = $hakases->id;
        $editRoles->save();
        $editRoles->roles()->attach($superadmin);
        $editRoles->roles()->attach($admin);

        $updateRoles = new Permission();
        $updateRoles->slug = 'update-hak-akses';
        $updateRoles->name = 'Update hak-akses';
        $updateRoles->task_id = $hakases->id;
        $updateRoles->save();
        $updateRoles->roles()->attach($superadmin);
        $updateRoles->roles()->attach($admin);

        $deleteRoles = new Permission();
        $deleteRoles->slug = 'delete-hak-akses';
        $deleteRoles->name = 'Delete hak-akses';
        $deleteRoles->task_id = $hakases->id;
        $deleteRoles->save();
        $deleteRoles->roles()->attach($superadmin);
        $deleteRoles->roles()->attach($admin);

        $createTask = new Permission();
        $createTask->slug = 'create-modul';
        $createTask->name = 'Create modul';
        $createTask->task_id = $task->id;
        $createTask->save();
        $createTask->roles()->attach($superadmin);
        $createTask->roles()->attach($admin);

        $viewTask = new Permission();
        $viewTask->slug = 'view-modul';
        $viewTask->name = 'View modul';
        $viewTask->task_id = $task->id;
        $viewTask->save();
        $viewTask->roles()->attach($superadmin);
        $viewTask->roles()->attach($admin);

        $editTask = new Permission();
        $editTask->slug = 'edit-modul';
        $editTask->name = 'Edit modul';
        $editTask->task_id = $task->id;
        $editTask->save();
        $editTask->roles()->attach($superadmin);
        $editTask->roles()->attach($admin);

        $updateTask = new Permission();
        $updateTask->slug = 'update-modul';
        $updateTask->name = 'Update modul';
        $updateTask->task_id = $task->id;
        $updateTask->save();
        $updateTask->roles()->attach($superadmin);
        $updateTask->roles()->attach($admin);

        $deleteTask = new Permission();
        $deleteTask->slug = 'delete-modul';
        $deleteTask->name = 'delete modul';
        $deleteTask->task_id = $task->id;
        $deleteTask->save();
        $deleteTask->roles()->attach($superadmin);
        $deleteTask->roles()->attach($admin);

        $createmenu = new Permission();
        $createmenu->slug = 'create-menu';
        $createmenu->name = 'Create menu';
        $createmenu->task_id = $menu->id;
        $createmenu->save();
        $createmenu->roles()->attach($superadmin);
        $createmenu->roles()->attach($admin);

        $viewmenu = new Permission();
        $viewmenu->slug = 'view-menu';
        $viewmenu->name = 'View menu';
        $viewmenu->task_id = $menu->id;
        $viewmenu->save();
        $viewmenu->roles()->attach($superadmin);
        $viewmenu->roles()->attach($admin);

        $editmenu = new Permission();
        $editmenu->slug = 'edit-menu';
        $editmenu->name = 'Edit menu';
        $editmenu->task_id = $menu->id;
        $editmenu->save();
        $editmenu->roles()->attach($superadmin);
        $editmenu->roles()->attach($admin);

        $updatemenu = new Permission();
        $updatemenu->slug = 'update-menu';
        $updatemenu->name = 'Update menu';
        $updatemenu->task_id = $menu->id;
        $updatemenu->save();
        $updatemenu->roles()->attach($superadmin);
        $updatemenu->roles()->attach($admin);

        $deletemenu = new Permission();
        $deletemenu->slug = 'delete-menu';
        $deletemenu->name = 'delete menu';
        $deletemenu->task_id = $menu->id;
        $deletemenu->save();
        $deletemenu->roles()->attach($superadmin);
        $deletemenu->roles()->attach($admin);
    }
}
