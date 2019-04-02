<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Permission;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Modul';
        $tasks = Task::all();
        return view('administrator.tasks.index', compact('tasks', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Modul Manajemen';
        return view('administrator.tasks.create', compact('tasks', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
        ];

        $this->validate(request(), [
            'title' => 'required|unique:tasks',
            'description' => 'required|unique:tasks'
        ], $messages);

        $title = request()->input('title');
        $slug = str_slug($title);

        $task = new Task;
        $task->title = $title;
        $task->slug = $slug;
        $task->description = request()->input('description');
        $task->save();
        
        $data = array(
            [
                'name'    => 'Create '. $title,
                'slug'    => 'create-'. $slug,
                'task_id' => $task->id
            ],
            [
                'name'    => 'view '. $title,
                'slug'    => 'view-'.$slug,
                'task_id' => $task->id
            ],
            [
                'name'    => 'Edit '.$title,
                'slug'    => 'edit-'.$slug,
                'task_id' => $task->id
            ],
            [
                'name'    => 'Update '.$title,
                'slug'    => 'update-'.$slug,
                'task_id' => $task->id
            ],
            [
                'name'    => 'Delete '.$title,
                'slug'    => 'delete-'.$slug,
                'task_id' => $task->id
            ],
        );

        foreach ($data as $induk) {
            Permission::Create($induk);
        }

        return redirect()->route('task.index')->with('message', 'Task Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $title = 'Detail Modul Manajemen';
        return view('administrator.tasks.show', compact('task', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $title = 'Edit Modul Manajemen';
        return view('administrator.tasks.edit', compact('task', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
        ];

        $this->validate(request(), [
            'title' => 'required|min:3|unique:tasks,title,' . $id,
            'description' => 'required'
        ], $messages);

        $title = request()->input('title');
        $slug = str_slug($title);
        // return $slug;
        $task = Task::find($id);
        // return $task;
        
        $task->title = $title;
        $task->slug = $slug;
        $task->description = $request->description;
        $task->update();

        $permission = Permission::where('task_id', $task->id)->get();

        foreach ($permission as $key => $v) {
            $p = Permission::find($v->id);
            $p->name = \explode(' ', $p->name)[0]." ".$title;
            $p->slug = \explode('-', $p->slug)[0]."-".$slug;
            $p->save();
        }
        return redirect()->route('task.index')->with('message', 'Task Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->permissions()->delete();
        $tasks->delete();

        return redirect()->route('task.index')->with('message', 'Task berhasil dihapus');
    }
}
