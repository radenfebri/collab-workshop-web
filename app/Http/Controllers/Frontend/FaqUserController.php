<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function index()
    {
        $data = FAQ::latest()->get();

        return view('user.faq', compact('data'));
    }
}
