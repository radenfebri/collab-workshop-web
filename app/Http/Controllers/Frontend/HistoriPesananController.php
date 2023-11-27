<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('user.histori-pesanan', compact('data', 'user', 'buku', 'bank'));
    }

    public function show($id)
    {
        $data = Order::findOrFail(decrypt($id));
        $buku = Buku::all();
        return view('user.detail', compact('data', 'buku'));
    }

    public function destroy($id)
    {
        $data = Order::findOrFail(decrypt($id));
        $data->delete();

        Alert::success('Berhasil', 'Data Berhasil tidak diproses');
        return back();
    }


    public function sukses()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $data = Order::where('user_id', $user_id)->where('status', 1)->latest()->get();

        return view('user.buku-sukses', compact('data', 'user'));
    }


    public function pending()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $data = Order::where('user_id', $user_id)->where('status', 0)->latest()->get();

        return view('user.buku-pending', compact('data','user'));
    }
}
