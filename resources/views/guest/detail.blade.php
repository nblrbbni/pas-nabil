@extends('layout.guest.master')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis" href="/">
                        <svg class="bi" width="16" height="16">
                            <use xlink:href="#house-door-fill"></use>
                        </svg>
                        <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $berita->kategori->nama_kategori }}
                </li>
            </ol>
        </nav>
    </div>
    
    <main class="container">
        <h1 class="display-4 fw-bold mb-2">{{ $berita->judul }}</h1>
        <p class="text-muted">Ditulis oleh: <b>{{ $berita->user->name }}</b></p>
        <img src="{{ asset('img/gambar/' . $berita->gambar) }}" class="img-fluid mx-auto d-block mb-3 rounded shadow"
            alt="{{ $berita->judul }}">
        <div class="mb-5">{!! $berita->isi !!}</div>
    </main>
@endsection
