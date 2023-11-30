<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }

    public function index()
    {
        $data = Order::latest()->get();
        $buku = Buku::all();
        $bank = Bank::all();
        return view('backend.pesanan.index', compact('data', 'buku', 'bank'));
    }

    public function edit($id)
    {
        $data = Order::findOrFail(decrypt($id));
        $data->update([
            'status' => '1',
        ]);
        $data->save();
        Alert::success('Berhasil', 'Data berhasil diproses');
        return back();
    }

    public function show($id)
    {
        $data = Order::findOrFail(decrypt($id));
        if ($data->bukti) {
            Storage::delete($data->bukti);
        }
        $data->delete();

        Alert::success('Berhasil', 'Data Berhasil dihapus');
        return back();
    }


    public function tolak($id)
    {
        $data = Order::findOrFail(decrypt($id));
        $data->update([
            'status' => '3',
        ]);
        $buku = Buku::findOrFail($data->buku_id);
        $buku->qty += 1;
        $data->save();
        Alert::success('Berhasil', 'Data berhasil ditolak');
        return back();
    }
}
