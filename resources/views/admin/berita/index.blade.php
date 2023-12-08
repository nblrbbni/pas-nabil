@extends('layout.admin.master')

@section('judul')
    Berita
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold my-auto">Tabel Berita</h5>
                    <a href="/berita-create" class="btn btn-primary">Tambah Berita</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive small">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($berita as $key => $value)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ Str::limit($value->judul, 10) }}</td>
                                    <td>{!! Str::words($value->isi, 10) !!}</td>
                                    <td>
                                        <img src="{{ asset('img/gambar/'.$value->gambar) }}" alt="" style="width: 40px;">
                                    </td>
                                    <td>{{ $value->kategori->nama_kategori }}</td>
                                    <td>{{ $value->user->name }}</td>
                                    <td>
                                        <a href="{{ route('berita.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form class="d-inline" onsubmit="return confirm('Sure to delete this data?')"
                                            action="{{ route('berita.delete', $value->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mb-0">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
