<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class HistoriPesananController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $buku = Buku::all();
        $bank = Bank::all();
        $data = Order::where('user_id', $user_id)->latest()->get();

        return view('user.pesanan.histori-pesanan', compact('data', 'user', 'buku', 'bank'));
    }

    public function show($id)
    {
        $data = Order::findOrFail(decrypt($id));
        $buku = Buku::all();
        return view('user.pesanan.detail', compact('data', 'buku'));
    }

    public function destroy($id)
    {
        $data = Order::findOrFail(decrypt($id));
        if ($data->bukti) {
            Storage::delete($data->bukti);
        }
        $buku = Buku::findOrFail($data->buku_id);
        $buku->qty += 1;
        $buku->save();
        $data->delete();

        Alert::success('Berhasil', 'Data Berhasil tidak diproses');
        return back();
    }

    public function sukses()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $data = Order::where('user_id', $user_id)->where('status', 1)->latest()->get();

        return view('user.pesanan.buku-sukses', compact('data', 'user'));
    }


    public function proses()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $data = Order::where('user_id', $user_id)->where('status', 0)->latest()->get();

        return view('user.pesanan.buku-proses', compact('data', 'user'));
    }


    public function review()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $data = Order::where('user_id', $user_id)->where('status', 2)->latest()->get();

        return view('user.pesanan.buku-review', compact('data', 'user'));
    }


    public function tolak()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $data = Order::where('user_id', $user_id)->where('status', 3)->latest()->get();

        return view('user.pesanan.buku-tolak', compact('data', 'user'));
    }


    public function bukti($id)
    {
        $data = Order::findOrFail(decrypt($id));
        $buku = Buku::all();
        return view('user.pesanan.upload-bukti', compact('data', 'buku'));
    }


    public function upload(Request $request)
    {
        $request->validate([
            'bukti' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $buktiName = date('d-m-Y-H-i-s') . '_' . $request->file('bukti')->getClientOriginalName();
            $buktiPath = $request->file('bukti')->storeAs('bukti-bayar', $buktiName);

            $order = Order::find($request->id);

            if ($order->bukti) {
                Storage::delete($order->bukti);
            }

            $order->bukti = $buktiPath;
            $order->status = 2;
            $order->save();

            Alert::success('Berhasil', 'Data berhasil diupload');
            return redirect()->route('histori-pesanan');
        }

        Alert::error('Gagal', 'Tidak ada file yang diunggah');
        return redirect()->back();
    }
}
