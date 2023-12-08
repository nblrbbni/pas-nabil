<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
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

        return redirect('/kategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori->update(['nama_kategori' => $request->nama_kategori]);

        return redirect('/kategori')->with('success', 'Update data berhasil');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        
        return redirect('/kategori')->with('success', 'Data berhasil dihapus');
    }
}
