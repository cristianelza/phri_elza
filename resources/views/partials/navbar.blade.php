<!-- Halaman Untuk Membuat Navbar -->
<!-- Navbar & Hero Start -->
<div class="container-fluid position-relative p-0  w-100">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary px-3 px-md-5 py-2">
        <div class="me-md-3">
            <img src="{{ asset('img/logo phri.png') }}" class="rounded-circle" alt="logo"
                style="width: 60px; height:60px;">
        </div>
        <div class="collapse navbar-collapse">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav d-none d-md-flex">
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'home' ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    {{-- <li class="nav-item">
              <a class="nav-link {{ ($active === 'about') ? 'active' : '' }}" href="/about">About</a>
            </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}"
                            href="{{ url('/posts') }}">Berita</a>
                    </li>
                    {{-- <li class="nav-item">
              <a class="nav-link {{ ($active === 'categories') ? 'active' : '' }}" href="/categories">Informasi</a>
            </li> --}}
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ $active === 'informasi' ? 'active' : '' }}"
                            href="/informasi">Informasi</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'kemitraan' ? 'active' : '' }}"
                            href="{{ url('/kemitraan') }}">Kemitraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'lowongan_kerja' ? 'active' : '' }}"
                            href="{{ url('/lowongan_kerja') }}">Lowongan Kerja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active === 'layanan' ? 'active' : '' }}"
                            href="{{ url('/layanan') }}">Layanan</a>
                    </li>
                </ul>

            </div>
        </div>

        <div class="account">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown position-relative">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Str::limit('Hi, ' . auth()->user()->username, 18, '...') }}
                        </a>
                        <ul class="dropdown-menu position-absolute right-0">
                            @if (Auth::user()->role_id === 1)
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i
                                            class="bi bi-layout-text-sidebar-reverse"> </i>My Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @elseif(Auth::user()->role_id === 3)
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i
                                            class="bi bi-layout-text-sidebar-reverse"> </i>My Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @elseif(Auth::user()->role_id === 2)
                                <li><a class="dropdown-item" href="{{ route('profile') }}"><i
                                            class="bi bi-layout-text-sidebar-reverse"> </i>Member Area</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right">
                                        </i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link {{ ($active === 'login') ? 'active' : '' }}" href="/login"> <i class="fa fa-sign-in-alt me-2"></i> Login</a>
              </li>
            </ul> --}}
                @endauth
            </ul>
        </div>
    </nav>

    <div class="bottom-navbar d-block d-md-none">
        <ul class="bottom-navbar-content list-unstyled">
            <li class="nav-item">
                <a class="nav-link {{ $active === 'home' ? 'active' : '' }} text-center" href="/">
                    <i class="icon mdi mdi-home"></i>
                    <p>Home</p>
                </a>
            </li>
            {{-- <li class="nav-item">
          <a class="nav-link {{ ($active === 'about') ? 'active' : '' }}" href="/about">About</a>
        </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ $active === 'posts' ? 'active' : '' }} text-center" href="/posts">
                    <i class="icon mdi mdi-newspaper"></i>
                    <p>Berita</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === 'lowongan_kerja' ? 'active' : '' }} text-center" href="/lowongan_kerja">
                    <i class="icon mdi mdi-information"></i>
                    <p>Lowker</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === 'kemitraan' ? 'active' : '' }} text-center" href="/kemitraan">
                    <i class="icon mdi mdi-handshake"></i>
                    <p>Kemitraan</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active === 'layanan' ? 'active' : '' }} text-center" href="/layanan">
                    <i class="icon mdi mdi-face-agent"></i>
                    <p>Layanan</p>
                </a>
            </li>

        </ul>
    </div>
</div>
