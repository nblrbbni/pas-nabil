<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
    
        return view('admin.kategori.index', ['kategori' => $kategori]);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::find($id)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect('/kategori')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return redirect()->to('/kategori')->with('success', 'Category successfully deleted!');
    }
}
