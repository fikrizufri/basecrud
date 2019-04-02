<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\Role;
use Storage;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit']]);
        $this->middleware('permission:update-user', ['only' => ['update']]);
        $this->middleware('permission:delete-user', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $title = 'User Manajemen';
        // $roles = Permission::all();
        return view('administrator.users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'User Manajemen';
        $roles = Role::all();
        // $roles = Permission::all();
        return view('administrator.users.create', compact('title', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'same' => 'Password dan konfirmasi password harus sama',
            'image' => 'File harus berextions JPG, PNG, BMP atau JPEG',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'passwordConfrim' => 'required|same:password|min:6',
            'icon' =>'image|mimes:jpeg,bmp,png'
        ], $messages);

        $pass = bcrypt(request()->input('password'));
        $name = request()->input('name');

        $user = new User;
        if ($request->file('icon')) {
            $icon = $request->file('icon');
            $ext = $icon->getClientOriginalExtension();
            
            if (file_exists($request->file('icon'))) {
                // return $user->icon = $request->file('icon');
                $icon_name = "icon_".$name.".$ext";
                $upload_path = 'img';
                $request->file('icon')->move($upload_path, $icon_name);
                $user->icon = $icon_name;
            }
        }
        $user->name = $name;
        $user->slug = str_slug($name);
        $user->email = request()->input('email');
        $user->password = $pass;
        $user->save();
        $user->roles()->sync($request->hakases);
        return redirect()->route('user.index')->with('message', 'User berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $izin =  $user->roles->pluck('id')->first();
        $title = 'Edit User Manajemen';
        return view('administrator.users.show', compact('user', 'roles', 'title', 'izin'));
    }

    public function profile($slug)
    {
        $user = User::where('slug', $slug)->first();
        $roles = Role::all();
        $izin =  $user->roles->pluck('id')->first();
        $title = 'Profile User Manajemen';
        return view('administrator.users.show', compact('user', 'roles', 'title', 'izin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $izin =  $user->roles->pluck('id')->first();
        $title = 'Edit User Manajemen';
        return view('administrator.users.edit', compact('user', 'roles', 'title', 'izin'));
    }

    public function setting($slug)
    {
        if (auth()->user()->slug != $slug) {
            abort(503);
        }
        $user = User::where('slug', $slug)->first();
        $roles = Role::all();
        $izin =  $user->roles()->pluck('id')->first();
        $title = 'Edit User Manajemen';
        return view('administrator.users.setting', compact('user', 'roles', 'title', 'izin'));
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
            'same' => ':attribute password dan confrim password harus sama',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|unique:users,email,' . $id,
            'passwordNew' => 'required|min:6',
            'passwordConfrim' => 'required|same:passwordNew|min:6',
        ], $messages);

        $user = User::find($id);
        $password = request()->input('password');
        $name = request()->input('name');
        
        if (Hash::check($password, $user->password)) {
            $pass = bcrypt(request()->input('passwordNew'));
        } else {
            return redirect()->route('user.edit', $user->id)->with('message', 'Password lama anda salah');
            ;
        }
        
        if ($request->file('icon')) {
            $exists = Storage::disk('icon')->exists($user->icon);

            if (isset($user->icon) == 'default-icon.png') {
                $delete = 'default-icon.png';
            } elseif (isset($user->icon) && $exists) {
                $delete = Storage::disk('icon')->delete($user->icon);
            }

            $icon = $request->file('icon');
            $ext = $icon->getClientOriginalExtension();

            if ($request->file('icon')->isValid()) {
                $icon_name = "user_".date('YmdHis').".$ext";
                $upload_path = 'img';
                $request->file('icon')->move($upload_path, $icon_name);
                $user->icon = $icon_name;
            }
        }

        $user->name = $name;
        $user->email = request()->input('email');
        $user->password = $pass;
        $user->update();
        $user->roles()->sync($request->hakases);

        return redirect()->route('user.index')->with('message', 'User berhasil diubah');
    }

    public function settingUpdate(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute tidak boleh sama',
            'same' => ':attribute password dan confrim password harus sama',
            'min' => ':attribute dan mini karakter 6',
        ];

        $this->validate(request(), [
            'name' => 'required|unique:users,name,' . $id,
            'email' => 'required|unique:users,email,' . $id,
        ], $messages);

        $user = User::find($id);
        $password = request()->input('passwordNew');
        $name = request()->input('name');
        
        if ($password) {
            $this->validate(request(), [
                'passwordNew' => 'min:6',
                'passwordConfrim' => 'same:passwordNew|min:6',
            ], $messages);
            $pass = bcrypt(request()->input('passwordNew'));
            return $pass ='apa';
            $user->password = $pass;
        }
        
        if ($request->file('icon')) {
            $exists = Storage::disk('icon')->exists($user->icon);

            if (isset($user->icon) == 'default-icon.png') {
                $delete = 'default-icon.png';
            } elseif (isset($user->icon) && $exists) {
                $delete = Storage::disk('icon')->delete($user->icon);
            }

            $icon = $request->file('icon');
            $ext = $icon->getClientOriginalExtension();

            if ($request->file('icon')->isValid()) {
                $icon_name = "user_".date('YmdHis').".$ext";
                $upload_path = 'img';
                $request->file('icon')->move($upload_path, $icon_name);
                $user->icon = $icon_name;
            }
        }

        $user->name = $name;
        $user->slug = str_slug($name);
        $user->email = request()->input('email');
        $user->update();

        return redirect()->route('user.setting', $user->slug)->with('message', 'Berhasil Mengupdate profiel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->roles()->detach();
        $exists = Storage::disk('icon')->exists($user->icon);

        if (isset($user->icon) && $exists) {
            $delete = Storage::disk('icon')->delete($user->icon);
        }
        $user->delete();

        return redirect()->route('user.index')->with('message', 'User berhasil dihapus');
    }
}
