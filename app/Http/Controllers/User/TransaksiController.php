<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $order = DB::table('orders')
                    ->join('status_orders','status_orders.id','=','orders.status_order_id')
                    ->join('users','users.id','=','orders.user_id')
                    ->join('metode_pembayarans','metode_pembayarans.id','=','orders.metode_pembayaran_id')
                    ->orderBy('updated_at', 'desc')
                    ->select('orders.*', 'status_orders.name', 'users.name as nama_pemesan', 'metode_pembayarans.name as pembayaran')
                    ->where('orders.status_order_id',2)
                    ->get();
        $data = array(
            'orderbaru' => $order
        );

        return view('user.transaksi_selesai', $data);
    }
}
