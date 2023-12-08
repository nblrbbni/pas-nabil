<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.berita.create', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id'   => 'required',
            'judul'         => 'required',
            'gambar'        => 'image|mimes:jpg,png,jpeg',
            'isi'           => 'required'
        ]);

        $gambarName = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('img/gambar'), $gambarName);

        $berita = new Berita;

        $berita->user_id     = auth()->user()->id;
        $berita->kategori_id = $request->kategori_id;
        $berita->judul       = $request->judul;
        $berita->gambar      = $gambarName;
        $berita->isi         = $request->isi;

        $berita->save();

        return redirect('/berita')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $berita   = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_id'   => 'required',
            'judul'         => 'required',
            'gambar'        => 'image|mimes:jpg,png,jpeg',
            'isi'           => 'required'
        ]);

        $berita = Berita::find($id);

        if ($request->has('gambar')) {
            $this->deleteImage($berita->gambar);

            $gambarName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/gambar'), $gambarName);
            $berita->gambar = $gambarName;
        }

        $berita->user_id     = auth()->user()->id;
        $berita->kategori_id = $request->kategori_id;
        $berita->judul       = $request->judul;
        $berita->isi         = $request->isi;

        $berita->save();

        return redirect('/berita')->with('success', 'Update data berhasil');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        $this->deleteImage($berita->gambar);
        $berita->delete();

        return redirect('/berita')->with('success', 'Data berhasil dihapus');
    }

    protected function deleteImage($imageName)
    {
        $path = public_path('img/gambar/') . $imageName;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
