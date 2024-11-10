<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    @if (Auth::user()->role_id != 3)
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">PHRI PONTIANAK</a>
    @else
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">ADMIN POLRES</a>
    @endif
    <button class="navbar-toggler position-end d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Cari"
            aria-label="Cari">
    {{-- <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="{{ url('/') }}/logout" method="POST">
                @csrf
                <button type="submit" class="nav-link px-3 bg-primary border-0">Logout <i
                        class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div> --}}
</header>
