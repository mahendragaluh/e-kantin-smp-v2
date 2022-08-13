<?php

namespace App\Http\Controllers\Waiter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class WaiterController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('waiter.home', compact('menus'));
    }

    public function pemesanan()
    {
        return view('waiter.pemesanan');
    }
}
