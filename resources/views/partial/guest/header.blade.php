<header id="main-header" class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="link-secondary" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">Portal Berita</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="link-secondary" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3"
                    role="img" viewBox="0 0 24 24">
                    <title>Search</title>
                    <circle cx="10.5" cy="10.5" r="7.5" />
                    <path d="M21 21l-5.2-5.2" />
                </svg>
            </a>
            @guest
                <a class="btn btn-sm btn-outline-secondary" href="/login">Sign up</a>
            @endguest

            @auth
                <a class="btn btn-sm btn-danger mx-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            @endauth
        </div>
    </div>
</header>