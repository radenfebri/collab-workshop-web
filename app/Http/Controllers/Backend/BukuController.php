<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }


    public function index()
    {
        $data = Buku::orderBy('created_at', 'desc')->get();
        return view('backend.buku.index', compact('data'));
    }


    public function create()
    {
        $kategoribuku = KategoriBuku::orderBy('created_at', 'desc')->get();
        return view('backend.buku.create', compact('kategoribuku'));
    }


    public function edit($id)
    {
        $buku = Buku::find(decrypt($id));
        $kategoribuku = KategoriBuku::orderBy('created_at', 'desc')->get();
        return view('backend.buku.edit', compact('buku', 'kategoribuku'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:bukus,name|min:3|max:50',
            'description' => 'required|min:3|max:100000',
            'cover' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategoribuku_id' => 'required',
            'original_price' => 'required',
            'qty' => 'required'
        ]);


        if (empty($request->file('cover'))) {
            $buku = new Buku([
                'name' => $request->name,
                'kategoribuku_id' => $request->kategoribuku_id,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'popular' => $request->popular  == TRUE ? '1' : '0',
            ]);
            $buku->save();

            Alert::success('Berhasil', 'Data berhasil ditambhakan');
            return redirect()->route('buku.index');
        } else {
            $coverName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover')->storeAs('cover-buku', $coverName);
            $buku = new Buku([
                'name' => $request->name,
                'kategoribuku_id' => $request->kategoribuku_id,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'popular' => $request->popular  == TRUE ? '1' : '0',
                'cover' => $cover,
            ]);
            $buku->save();

            Alert::success('Berhasil', 'Data berhasil ditambhakan');
            return redirect()->route('buku.index');
        }
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|unique:bukus,name,' . $id,
            'description' => 'required',
            'cover' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategoribuku_id' => 'required',
            'original_price' => 'required',
            'qty' => 'required'
        ]);


        if (empty($request->file('cover'))) {
            $buku = Buku::findOrFail($id);
            $buku->update([
                'name' => $request->name,
                'kategoribuku_id' => $request->kategoribuku_id,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'popular' => $request->popular  == TRUE ? '1' : '0',
            ]);


            Alert::success('Berhasil', 'Data berhasil diupdate');
            return redirect()->route('buku.index');
        } else {
            $buku = Buku::findOrFail($id);
            $coverName = date(now()->format('d-m-Y-H-i-s')) . '_' . $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover')->storeAs('cover-buku', $coverName);
            Storage::delete($buku->cover);
            $buku->update([
                'name' => $request->name,
                'kategoribuku_id' => $request->kategoribuku_id,
                'description' => $request->description,
                'original_price' => $request->original_price,
                'selling_price' => $request->selling_price,
                'qty' => $request->qty,
                'slug' => Str::slug($request->name),
                'popular' => $request->popular  == TRUE ? '1' : '0',
                'cover' => $cover,
            ]);

            Alert::success('Berhasil', 'Data berhasil diupdate');
            return redirect()->route('buku.index');
        }
    }


    public function show($id)
    {
        $data = Buku::findOrFail(decrypt($id));

        if ($data->cover != null) {
            Storage::delete($data->cover);
        }
        $data->delete();

        Alert::success('Berhasil', 'Buku Berhasil Dihapus');
        return redirect()->route('buku.index');
    }
}
