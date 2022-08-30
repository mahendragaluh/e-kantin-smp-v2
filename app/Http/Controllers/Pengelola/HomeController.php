<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        return view('pengelola.home');
    }

    public function pemesanan()
    {
        return view('waiter.pemesanan');
    }
}
