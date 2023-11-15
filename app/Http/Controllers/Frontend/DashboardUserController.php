<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('cekRole:User');
    }

    public function user()
    {
        return view('user.user-dashboard');
    }
}
