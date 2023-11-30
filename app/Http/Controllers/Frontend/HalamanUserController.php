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
        $data = Order::where('user_id', $user_id)->where('status', 0)->orWhere('status', 2)->latest()->get();
        $proses = Order::where('user_id', $user_id)->where('status', 0)->latest()->get();
        $berhasil = Order::where('user_id', $user_id)->where('status', 1)->latest()->get();
        $review = Order::where('user_id', $user_id)->where('status', 2)->latest()->get();
        $tolak = Order::where('user_id', $user_id)->where('status', 3)->latest()->get();

        return view('user.user-dashboard', compact('user', 'buku', 'data', 'proses', 'review', 'tolak', 'berhasil'));

    }
}
