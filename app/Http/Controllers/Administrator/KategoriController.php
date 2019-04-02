<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Manajemen Kategori';
        $kategoris = Kategori::all();
        return view('administrator.kategoris.index', compact('kategoris', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Manajemen Kategori';
        return view('administrator.kategoris.create', compact('title'));
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
        ];

        $this->validate(request(), [
            'name' => 'required|unique:kategoris'
        ], $messages);

        $kategori = new Kategori;
        $kategori->name = request()->input('name');
        $kategori->save();
        return redirect()->route('kategori.index')->with('message', 'Kategori Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kategori';
        $kategori = Kategori::find($id);
        return view('administrator.kategoris.show', compact('kategori', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Manajemen Kategori';
        $kategori = Kategori::find($id);
        return view('administrator.kategoris.edit', compact('kategori', 'title'));
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
            'name' => 'required|min:3|unique:kategoris,name,' . $id,
        ], $messages);


        $name = request()->input('name');
        
        $kategori = kategori::find($id);
        $kategori->name = $name;
        $kategori->update();
        return redirect()->route('kategori.index')->with('message', 'Kategori Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('message', 'Kategori berhasil dihapus');
    }
}
