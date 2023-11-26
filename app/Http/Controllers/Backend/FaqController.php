<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }

    public function index()
    {
        $data = FAQ::latest()->get();

        return view('backend.faq.index', compact('data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        FAQ::create($request->all());

        Alert::success('Berhasil', 'Data berhasil ditambhakan');
        return back();
    }


    public function show($id)
    {
        $data = FAQ::findOrFail(decrypt($id));
        $data->delete();

        Alert::success('Berhasil', 'Data berhasil dihapus');
        return back();
    }


    public function edit($id)
    {
        $data = FAQ::findOrFail(decrypt($id));

        return view('backend.faq.edit', compact('data'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        $data = FAQ::findOrFail($id);

        $data->update($request->all());

        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect()->route('manajemen-faq.index');
    }
}
