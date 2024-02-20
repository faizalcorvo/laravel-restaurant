<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.index', ["menus" => Menu::all()]);
    }

    public function create()
    {
        return view("menu.create");
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nameMenu' => 'required',
            'descMenu' => 'required',
            'photoMenu' => 'image|file',
            'price' => 'required',
        ]);

        // jika user mengupload file photo menu
        if ($request->file('photoMenu')) {
            $validateData['photoMenu'] = $request->file('photoMenu')->store('images');
        }

        Menu::create($validateData);

        return redirect("/menu")->with('success', "Menu Data has been Created!");
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', ['menu' => $menu]);
    }

    public function update(Request $request, Menu $menu)
    {
        $rules = [
            'nameMenu' => 'required',
            'descMenu' => 'required',
            'photoMenu' => 'image|file',
            'price' => 'required',
        ];

        // validasi data sesuai isi dari variable rules
        $validateData = $request->validate($rules);

        // cek apakah ada image baru atau tidak
        if ($request->file('photoMenu')) {
            // hapus gambar yang lama 
            Storage::delete($menu->photoMenu);
            $validateData['photoMenu'] = $request->file('photoMenu')->store('images');

            Menu::where("id", $menu->id)->update($validateData);

            return redirect('/menu')->with('success', 'Menu Data has been Edited!');
        }
    }

    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);

        // jika ada gambar, kita delete juga gambarnya
        if ($menu->id) {
            Storage::delete($menu->photoMenu);
        }

        return redirect('/menu')->with('success', "Menu Data has been Deleted!");
    }
}
