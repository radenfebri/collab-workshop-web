<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function index()
    {
        $data = About::first();

        return view('user.about', compact('data'));
    }
}
