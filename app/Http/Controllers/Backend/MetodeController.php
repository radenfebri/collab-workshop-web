<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MetodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }
    
    public function index()
    {
        $data = Bank::latest()->get();
        return view('backend.metode-bayar.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'unique:banks,nama_bank|required|string|min:3|max:50',
            'atas_nama' => 'required|string|min:3|max:50',
            'no_rek' => 'required|string|min:3|max:50',
        ]);

        $data = Bank::create($request->all());
        $data->save();

        Alert::success('Berhasil', 'Data berhasil ditambhakan');
        return back();
    }

    public function edit($id)
    {
        $data = Bank::findOrFail(decrypt($id));

        return view('backend.metode-bayar.edit', compact('data'));
    }

    public function show($id)
    {
        $data = Bank::findOrFail(decrypt($id));
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bank' => 'required|string|min:3|max:50|unique:banks,nama_bank,' . $id,
            'atas_nama' => 'required|string|min:3|max:50',
            'no_rek' => 'required|string|min:3|max:50',
        ]);

        $data = Bank::findOrFail($id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect()->route('metode-bayar.index');
    }
}
