<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }

    public function index()
    {
        $data = About::first();

        return view('backend.about.index', compact('data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        About::create($request->all());
        Alert::success('Berhasil', 'Data berhasil ditambhakan');
        return back();
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        $data = About::find($id);
        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate');
        return back();
    }
}
