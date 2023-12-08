<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel" style="height: 100%;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Portal Berita</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="height: 95vh">
            <a href="/"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4"><b>Admin Dashboard</b></span>
            </a>
            <ul class="nav nav-pills flex-column mb-auto">
                <hr />
                <li class="nav-item">
                    <a href="/kategori" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}"
                        aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Kategori
                    </a>
                </li>
                <li>
                    <a href="/berita" class="nav-link {{ request()->is('berita*') ? 'active' : '' }}">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                        Berita
                    </a>
                </li>
            </ul>
            <hr />
            <div class="dropdown">
                <a href="#"
                    class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt width="32" height="32"
                        class="rounded-circle me-2" />
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li>
                        <a class="dropdown-item signout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            Sign Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
