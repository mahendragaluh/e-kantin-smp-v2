<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keranjang;

class MenuController extends Controller
{
    public function simpan(Request $request)
    {
        Keranjang::create([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'qty' => $request->qty
        ]);

        return redirect()->route('user.keranjang');
    }
}
