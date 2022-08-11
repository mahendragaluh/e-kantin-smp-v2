<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class HomeAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('admin.home');
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
}
