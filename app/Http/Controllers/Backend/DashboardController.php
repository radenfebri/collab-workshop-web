<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buku;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $total_admin = User::where('role', 'Admin')->count();
        $buku = Buku::all();
        $bank = Bank::all();
        $buku_habis = Buku::where('qty', '<=', 5)->get();
        $data = Order::where('status', 0)->latest()->get();
        $trx_success = Order::where('status', 1)->get();
        $trx_pending = Order::where('status', 0)->get();
        $total_beli = Order::where('status', 1)->sum('total_price');


        return view('backend.dashboard', compact('total_admin','user', 'buku_habis', 'buku', 'data', 'total_beli', 'trx_success', 'trx_pending', 'total_user', 'bank'));
    }
}
