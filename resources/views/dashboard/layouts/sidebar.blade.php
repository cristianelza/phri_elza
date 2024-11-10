<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse h-100">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @can('admin')
                @if (Auth::user()->role_id === 1 || Auth::guard('web')->user()->role_id === 1)
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active-sidebar' : '' }}" href="/dashboard">
                            <i class="fa-solid fa-house"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active-sidebar' : '' }}"
                            href="{{ url('/') }}/dashboard/posts">
                            <i class="fa-solid fa-file-lines"></i>
                            Berita
                        </a>
                    </li>
            </ul>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>ADMINISTRATOR</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active-sidebar' : '' }}"
                        href="{{ url('/') }}/dashboard/categories">
                        <i class="fa-solid fa-list"></i>
                        Kategori Berita
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/manajement_akun*') ? 'active-sidebar' : '' }}"
                        href="{{ url('/') }}/dashboard/manajement_akun">
                        <i class="fa-solid fa-user"></i>
                        Manajemen Akun
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/member*') ? 'active-sidebar' : '' }}"
                        href="{{ url('/') }}/dashboard/member">
                        <i class="fa-solid fa-users"></i>
                        Member
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/mitra') ? 'active-sidebar' : '' }}"
                        href="{{ url('/') }}/dashboard/mitra">
                        <i class="fa-solid fa-handshake"></i>
                        Mitra
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/lowongan_kerja') ? 'active-sidebar' : '' }}"
                        href="{{ url('/') }}/dashboard/lowongan_kerja">
                        <i class="fa-solid fa-briefcase"></i>
                        Lowongan Kerja
                    </a>
                </li>
            </ul>
            @endif
            @if (Auth::user()->role_id === 2 || Auth::guard('web')->user()->role_id === 2)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/profile') ? 'active-sidebar' : '' }}"
                            href="{{ url('/') }}/dashboard/profile">
                            <i class="fa-regular fa-user"></i>
                            Profile
                        </a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/pelayanan') ? 'active-sidebar' : '' }}"
                            href="{{ url('/') }}/dashboard/pelayanan">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            Riwayat Layanan
                        </a>
                    </li>
                </ul>
                {{-- <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/layanan') ? 'active-sidebar' : '' }}"
                            href="/dashboard/layanan">
                            <i class="fa-solid fa-bell-concierge"></i>
                            Riwayat Layanan
                        </a>
                    </li>
                </ul> --}}
            @endif

            @if (Auth::user()->role_id === 1 || Auth::guard('web')->user()->role_id === 1)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/layanan') ? 'active-sidebar' : '' }}"
                            href="{{ url('/') }}/dashboard/layanan">
                            <i class="fa-solid fa-bell-concierge"></i>
                            Layanan
                        </a>
                    </li>
                </ul>
            @endif
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/pengaduan') ? 'active-sidebar' : '' }}"
                        href="{{ url('/') }}/dashboard/pengaduan">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Riwayat Pengaduan
                    </a>
                </li>
            </ul>
            @if (Auth::user()->role_id === 1 || Auth::guard('web')->user()->role_id === 1)
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('dashboard/pelayanan') ? 'active-sidebar' : '' }}"
                            href="{{ url('/') }}/dashboard/pelayanan">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            Riwayat Layanan
                        </a>
                    </li>
                </ul>
                @endif
                <ul class="nav flex-column">
                    <div class="nav-item text-nowrap">
                        <form action="{{ url('/') }}/logout" method="POST">
                            @csrf
                            <button type="submit" class="nav-link px-5 bg-primary text-white border-0 mt-3">Logout <i
                                    class="fa-solid fa-right-from-bracket"></i></button>
                        </form>
                    </div>
                </ul>
        @endcan
    </div>
</nav>
