<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $berita = Berita::all();
        
        return view('guest.app', compact('berita', 'kategori'));
    }

    public function detail($id)
    {
        $kategori = Kategori::all();
        $berita = Berita::findOrFail($id);
        
        return view('guest.detail', compact('berita', 'kategori'));
    }
}
