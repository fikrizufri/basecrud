<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $user = User::count();
        $users = User::all();
        return view('administrator.index', compact('title', 'user', 'users'));
    }

    public function user(Request $request)
    {
        $user = [];
        if ($request->ajax()) {
            // $user = User::find($request->id);
            $user = User::where('id', $request->id)->get();

            return response()->json($user);
        }
    }
}
