<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.home');
    }

    public function transaksi()
    {
        return view('kasir.transaksi');
    }
}
