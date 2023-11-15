<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }


    public function index()
    {
        $data = User::latest()->get();

        return view('backend.manajemen-user.index', compact('data'));
    }


    public function edit($id)
    {
        $data = User::findOrFail(decrypt($id));

        return view('backend.manajemen-user.edit', compact('data'));
    }

    
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());
        $data->save();
        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect()->route('manajemen-user.index');
    }
}
