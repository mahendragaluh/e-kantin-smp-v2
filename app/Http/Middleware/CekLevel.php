<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level_id, $levels)) {
            return $next($request);
        }
        if (Auth::user()->level_id == '1') {
            return redirect('/dashboard-admin');
        } elseif (Auth::user()->level_id == '2') {
            return redirect('/kasir/transaksi/pesanan-baru');
        } elseif (Auth::user()->level_id == '3') {
            return redirect('/dashboard-pengelola');
        } elseif (Auth::user()->level_id == '4') {
            return redirect('/home');
        }
        return redirect('/');
    }
}
