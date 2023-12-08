@extends('layout.guest.master')

@push('styles')
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
@endpush

@section('content')
    <main class="container">
        <div id="carouselExample" class="carousel slide mb-3">
            <div class="carousel-inner">
                @foreach ($berita as $key => $value)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('img/gambar/' . $value->gambar) }}" class="img-fluid rounded"
                            style="object-fit: cover; width: 100%; height: 650px;" alt="...">
                    </div>
                @endforeach
            </div>

            <!-- Indikator Carousel Bootstrap -->
            <div class="carousel-indicators">
                @foreach ($berita as $key => $value)
                    <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $key + 1 }}"></button>
                @endforeach
            </div>

            <!-- Tombol Carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h1 class="mt-5">Berita Pilihan:</h1>

        <div class="row">
            @foreach ($berita as $value)
                <div class="col-lg-4 col-md-6 mb-4 pb-1">
                    <div class="card">
                        <img src="{{ asset('img/gambar/' . $value->gambar) }}" class="img-fluid rounded-top"
                            style="object-fit: cover; width: 100%; height: 250px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $value->judul }}</h5>
                            <p class="card-text text-muted">Ditulis oleh: <b>{{ $value->user->name }}</b></p>
                            <p class="card-text">{{ Str::limit(strip_tags($value->isi), 100) }}</p>
                            <a href="{{ route('detail', $value->id) }}" class="btn btn-primary">Read</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
