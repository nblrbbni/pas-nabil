@extends('layout.admin.master')

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('judul')
    Berita
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/berita">Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Berita</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="namaJudul" class="form-label">Judul Berita</label>
                                <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}"
                                    id="namaJudul">
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="isi" class="form-label">Isi</label>
                                <div id="isi" style="height:350px;">{!! $berita->isi !!}</div>
                                <textarea class="form-control" name="isi" id="content-textarea" hidden style="display: none;">{!! $berita->isi !!}</textarea>
                                @error('isi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="card shadow-none border text-center ">
                                    <label class="form-label border-dashed cursor-pointer" id="label"
                                        style="border-radius:10px;" for="imageFile">Masukkan Gambar
                                        <img class="img-preview img-fluid mb-2">
                                        <img src="{{ asset('img/gambar/' . $berita->gambar) }}" id="plusimg"
                                            class="img-fluid p-md-3" alt="">
                                        <input accept="image/*" type="file" name="gambar" value="{{ $berita->gambar }}"
                                            class="form-control mt-3" id="imageFile" onchange="previewImage()">
                                    </label>
                                    @error('gambar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kategoriSelect" class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id" id="kategoriSelect">
                                    @foreach ($kategori as $value)
                                        @if ($value->id === $berita->kategori_id)
                                            <option value="{{ $value->id }}" selected>{{ $value->nama_kategori }}
                                            </option>
                                        @else
                                            <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>
        function previewImage() {
            const imageFile = document.querySelector('#imageFile');
            const imgPreview = document.querySelector('.img-preview');
            const label = document.querySelector('#label');
            const img = document.querySelector('#plusimg');

            img.style.display = 'none';
            label.style.border = 0;
            imgPreview.style.display = 'block';

            const blob = URL.createObjectURL(imageFile.files[0]);
            imgPreview.src = blob;
        }
        var toolbarOptions = [
            [{
                'font': []
            }],
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'], // toggled buttons
            ['blockquote', 'code-block'],

            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],

            [{
                'color': []
            }, {
                'background': []
            }],
            [{
                'align': []
            }],

            ['clean']
        ];
        var quill = new Quill('#isi', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        quill.on('text-change', function(delta, source) {
            updateHtmlOutput()
        })

        // When the convert button is clicked, update output
        $('#btn-convert').on('click', () => {
            updateHtmlOutput()
        })

        // Return the HTML content of the editor
        function getQuillHtml() {
            return quill.root.innerHTML;
        }

        // Highlight code output
        function updateHighlight() {
            hljs.highlightBlock(document.querySelector('#content-textarea'))
        }


        function updateHtmlOutput() {
            let html = getQuillHtml();
            console.log(html);
            document.getElementById('content-textarea').innerText = html;
            updateHighlight();
        }


        updateHtmlOutput()
    </script>
@endpush
