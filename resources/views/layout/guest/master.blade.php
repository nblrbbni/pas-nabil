<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Berita</title>

    {{-- Examples Bootsrap --}}
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/footers/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/breadcrumbs/">

    {{-- Bootstrap --}}
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/style/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/style/breadcrumbs.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" rel="stylesheet" />

    @stack('styles')
</head>

<body>
    <div class="container">
        {{-- SVG --}}
        @include('partial.guest.svg')

        {{-- Header --}}
        @include('partial.guest.header')

        <div class="nav-scroller py-1 mb-3 border-bottom">
            {{-- Navbar --}}
            @include('partial.guest.navbar')
        </div>
    </div>

    {{-- Content --}}
    @yield('content')

    <div class="container-fluid bg-body-tertiary">
        <div class="container">
            {{-- Footer --}}
            @include('partial.guest.footer')
        </div>
    </div>

    {{-- Scripts Link --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
