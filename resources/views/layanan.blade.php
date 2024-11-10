@extends('layouts.main')

@section('container')
    <h1 class="mb-3"> Layanan Kami </h1>

    <div class="carousel-header mb-5">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('img/carousel-2.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h4>
                            <h1 class="display-2 caption-title text-capitalize text-white mb-4">PHRI PONTIANAK</h1>
                            <p class="mb-5 fs-5 caption-subtitle">Sistem Digitalisasi Yang Terintegrasi dengan Seluruh
                                Anggota PHRI Kota Pontianak</p>
                            @auth
                                <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 5)
                                    @else
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                            href="{{ url('/pendaftaran') }}">Daftar Sekarang</a>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h4>
                            <h1 class="display-2 caption-title text-capitalize text-white mb-4">PHRI PONTIANAK</h1>
                            <p class="mb-5 fs-5 caption-subtitle">Sistem Digitalisasi Yang Terintegrasi dengan Seluruh
                                Anggota PHRI Kota Pontianak</p>
                            @auth
                                <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 5)
                                    @else
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                            href="{{ url('/') }}/pendaftaran">Daftar Sekarang</a>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h4>
                            <h1 class="display-2 caption-title text-capitalize text-white mb-4">PHRI PONTIANAK</h1>
                            <p class="mb-5 fs-5 caption-subtitle">Sistem Digitalisasi Yang Terintegrasi dengan Seluruh
                                Anggota PHRI Kota Pontianak</p>
                            @auth
                                <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 5)
                                    @else
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                            href="{{ url('/pendaftaran') }}">Daftar Sekarang</a>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <div class="container-fluid bg-light service py-5">
        <div class="row row-cols-1 row-cols-md-3 g-4" class="h-100">
            @foreach ($data_layanan as $key_layanan => $loop_layanan)
                <div class="col h-100" style="min-height: 172px; max-height: 172px">
                    <a href="{{ route('akses_layanan', ['layanan_id' => $loop_layanan->id]) }}" class="h-100"
                        style="display: block; min-height: 172px; max-height: 172px">
                        <div class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0 h-100"
                            class="" style="min-height: 172px; max-height: 172px">
                            <img src="{{ $loop_layanan->take_foto }}" class="rounded mx-auto d-block" class="h-100"
                                style="width:45%" alt="...">
                            <div class="card-body" class="h-100">
                                <h5 class="card-title text-center">{{ Str::title($loop_layanan->nama) }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    <div>
        {{ $data_layanan->links() }}
    </div>
    </nav>
@endsection
