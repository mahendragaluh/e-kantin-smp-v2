<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Menu;

class HomeAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $menus = Menu::all();
        return view('admin.home', compact('menus'));
    }

    public function users(Request $request)
    {
        $levels = Level::orderBy('id', 'ASC')->get();
        return view('admin.pengguna.users', compact('levels'));
    }

    public function level()
    {
        $levels = Level::orderBy('id', 'ASC')->get();
        return view('admin.pengguna.level', compact('levels'));
    }

    public function store_level(Request $request)
    {
        $this->validate($request, [
            'name_level' => 'required',
        ]);

        $levels = new Level;
        $levels->name_level = $request->name_level;
        $levels->save();

        if ($levels) {
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function update_level(Request $request, $id)
    {
        $this->validate($request, [
            'name_level' => 'required',
        ]);

        $levels = Level::findOrFail($id);

        $levels->update([
            'name_level' => $request->name_level,
        ]);

        if ($levels) {
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function menu()
    {
        $menus = Menu::all();
        return view('admin.menu', compact('menus'));
    }

    public function store_menu(Request $request)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'jenis_menu' => 'required',
            'harga_menu' => 'required',
            'foto_menu' => 'required',
            'status_menu' => 'required',
        ]);

        $fotoMenu = $request->foto_menu;
        $extension = $fotoMenu->getClientOriginalExtension();
        $namaFoto = 'FotoMenu_' . date('YmdHis') . '.' . $extension;

        $menus = new Menu;
        $menus->nama_menu = $request->nama_menu;
        $menus->jenis_menu = $request->jenis_menu;
        $menus->harga_menu = $request->harga_menu;
        $menus->foto_menu = $namaFoto;
        $menus->status_menu = $request->status_menu;

        $fotoMenu->move(public_path().'/assets/img/menu', $namaFoto);
        $menus->save();

        if ($menus) {
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }
    public function update_menu(Request $request, $id)
    {
        $this->validate($request, [
            'nama_menu' => 'required',
            'jenis_menu' => 'required',
            'harga_menu' => 'required',
            'status_menu' => 'required',
        ]);

        $menus = Menu::findOrFail($id);
        $awal = $menus->foto_menu;

        if ($request->foto_menu) {
            $request->foto_menu->move(public_path().'/assets/img/menu', $awal);
        }

        $dataUpdate = [
            'nama_menu' => $request['nama_menu'],
            'jenis_menu' => $request['jenis_menu'],
            'harga_menu' => $request['harga_menu'],
            'foto_menu' => $awal,
            'status_menu' => $request['status_menu'],
        ];

        $menus->update($dataUpdate);

        if ($menus) {
            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function destroy_menu($id)
    {
        $menus = Menu::findOrFail($id);

        if ($menus) {

            if(File::exists(public_path('assets/img/menu/'.$menus->foto_menu))) {
                File::delete(public_path('assets/img/menu/'.$menus->foto_menu));
            }

            $menus->delete();

            return redirect()
                ->back();
        } else {
            return redirect()
                ->back();
        }
    }

    public function transaksi()
    {
        return view('admin.transaksi');
    }

    public function pemesanan()
    {
        return view('admin.pemesanan');
    }
}
