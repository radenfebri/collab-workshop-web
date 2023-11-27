<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HalamanUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function user()
    {
        $user_id = Auth::id();
        $user = Auth::user()->name;
        $buku = Buku::all();
        $data = Order::where('user_id', $user_id)->where('status', 0)->latest()->get();
        $bukusayasukses = Order::where('user_id', $user_id)->where('status', 1)->latest()->get();
        $bukusaya = Order::where('user_id', $user_id)->latest()->get();
        $total_beli = Order::where('user_id', $user_id)->where('status', 1)->join('bukus', 'orders.buku_id', '=', 'bukus.id')->sum('bukus.original_price');

        return view('user.user-dashboard', compact('user', 'buku', 'data', 'bukusaya', 'total_beli', 'bukusayasukses'));
    }
}
