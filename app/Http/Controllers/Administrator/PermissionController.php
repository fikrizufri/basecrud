<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Task;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-hak-akses', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-hak-akses', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-hak-akses', ['only' => ['edit']]);
        $this->middleware('permission:update-hak-akses', ['only' => ['update']]);
        $this->middleware('permission:delete-hak-akses', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $title = 'Hak Akses Manajemen';
        // $roles = Permission::all();
        return view('administrator.permissions.index', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $tasks = Task::all();
        $title = 'Tambah Hak Akses Manajemen';

        return view('administrator.permissions.create', compact('role', 'tasks', 'title'));
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
            'name' => 'required|min:3|unique:permissions',
            'izin_akses' => 'required'
        ], $messages);

        $role = new Role;
        $role->name = $request->name;
        $role->slug = str_slug($request->name);
        $role->save();
        $role->permissions()->sync($request->izin_akses);

        return redirect()->route('permission.index')->with('message', 'Role Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $izin = $role->permissions->pluck('name')->toArray();
        $tasks = Task::all();
        $title = 'Hak Akses Manajemen';
        return view('administrator.permissions.show', compact('role', 'tasks', 'izin', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $izin = $role->permissions->pluck('name')->toArray();
        $tasks = Task::all();
        $title = 'Edit Akses Manajemen';
        return view('administrator.permissions.edit', compact('role', 'tasks', 'izin', 'title'));
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
            'name' => 'required|min:3|unique:permissions,name,' . $id,
            'izin_akses' => 'required'
        ], $messages);
        
        $role = Role::find($id);
        $role->name = $request->name;
        $role->slug = str_slug($request->name);
        $role->update();
        $role->permissions()->sync($request->izin_akses);

        return redirect()->route('permission.index')->with('message', 'Role berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('permission.index')->with('message', 'Role berhasil dihapus');
    }
}
