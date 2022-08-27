<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesanCartController extends Controller
{
    // Menyimpan item/produk yang dipilih visitor dalam cart menggunakan session
    public function keepProduct($id_menu, $nama_menu, $harga_menu)
    {
        /*
        * from request instance
        * $item = request()->session()->put('item', 'roy');
        */

        /*
        * Melalui global helper
        * $item = session(['item' => 'rusdiana']);
        */

        // Values disimpan dalam session array items, id, dan harga
        request()->session()->push('items', [$nama_menu]);
        request()->session()->push('id', [$id_menu]);
        request()->session()->push('harga', [$harga_menu]);
        return back();
    }
}
