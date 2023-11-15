<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBuku;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriBukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }


    public function index()
    {
        $data = KategoriBuku::latest()->get();

        return view('backend.kategori-buku.index', compact('data'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:kategori_bukus,name|required|string|min:3|max:50',
        ]);

        $data = KategoriBuku::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
        $data->save();

        Alert::success('Berhasil', 'Data berhasil ditambhakan');
        return back();
    }


    public function show($id)
    {
        $data = KategoriBuku::findOrFail(decrypt($id));
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return back();
    }


    public function edit($id)
    {
        $data = KategoriBuku::findOrFail(decrypt($id));

        return view('backend.kategori-buku.edit', compact('data'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);

        $data = KategoriBuku::findOrFail($id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect()->route('kategori-buku.index');
    }
}
