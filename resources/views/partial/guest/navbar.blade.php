<nav id="main-navbar" class="nav nav-underline justify-content-between">
    @foreach ($kategori as $value)
        <a class="nav-item nav-link link-body-emphasis" href="#">{{ $value->nama_kategori }}</a>
    @endforeach
</nav>
