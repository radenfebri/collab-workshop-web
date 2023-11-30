<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:Admin');
    }


    public function index()
    {
        $user = Auth::user()->name;
        $total_user = User::where('role', 'User')->count();
        $buku = Buku::all();
        $bank = Bank::all();
        $buku_habis = Buku::where('qty', '<=', 5)->get();
        $data = Order::where('status', 0)->orwhere('status', 2)->latest()->get();
        $trx_success = Order::where('status', 1)->get();
        $trx_proses = Order::where('status', 0)->get();
        $trx_review = Order::where('status', 2)->get();
        $trx_tolak = Order::where('status', 3)->get();
        $total_beli = Order::where('status', 1)->sum('total_price');

        return view('backend.dashboard', compact('trx_review', 'user', 'buku_habis', 'buku', 'data', 'total_beli', 'trx_success', 'trx_proses', 'trx_tolak', 'total_user', 'bank'));
    }


    public function stok()
    {
        $data = Buku::where('qty', '<=', 5)->get();
        return view('backend.buku.stok-buku', compact('data'));
    }


    public function admin()
    {
        $data = User::where('role', 'Admin')->get();

        return view('backend.manajemen-user.admin', compact('data'));
    }


    public function user()
    {
        $data = User::where('role', 'User')->get();

        return view('backend.manajemen-user.user', compact('data'));
    }


    public function selesai()
    {
        $data = Order::where('status', 1)->get();

        return view('backend.pesanan.selesai', compact('data'));
    }


    public function proses()
    {
        $data = Order::where('status', 0)->get();

        return view('backend.pesanan.proses', compact('data'));
    }


    public function tolak()
    {
        $data = Order::where('status', 3)->get();

        return view('backend.pesanan.tolak', compact('data'));
    }


    public function review()
    {
        $data = Order::where('status', 2)->get();

        return view('backend.pesanan.review', compact('data'));
    }
}
