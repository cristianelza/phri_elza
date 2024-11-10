@extends('layouts.main')

@section('css')
@endsection

@section('container')
    <!-- Carousel Start -->
    <div class="carousel-header mb-md-5">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
            </ol>
            @auth
                <div class="d-grid mb-4">
                    @if (Auth::user()->role_id != 2)
                    @else
                        <a class="btn-hover-bg btn btn-danger rounded-pill text-white py-3 px-5 position-relative m-md-3"
                            href="{{ url('/') }}/halaman_panic">Button Panic</a>
                    @endif
                </div>
            @endauth
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('img/1 1.png') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h4>
                            <h1 class="display-2 caption-title text-capitalize text-white mb-4">PHRI PONTIANAK</h1>
                            <p class="mb-5 fs-5 caption-subtitle">Sistem Digitalisasi Yang Terintegrasi dengan Seluruh
                                Anggota PHRI Kota Pontianak</p>
                            @auth
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            @if (Auth::user()->role_id != 2)

                            @else
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4" href="/halaman_panic">Button Panic</a>
                            @endif

                        </div> --}}
                            @else
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn-hover-bg btn btn-success text-white rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4"
                                        href="{{ url('/') }}/login">Masuk Sebagai Anggota</a>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4" href="/pendaftaran">Informasi Pendaftaran</a>
                        </div> --}}
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
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            @if (Auth::user()->role_id != 2)
                            @else
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4" href="/halaman_panic">Button Panic</a>
                            @endif

                        </div> --}}
                            @else
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn-hover-bg btn btn-success text-white rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4"
                                        href="{{ url('/') }}/login">Masuk Sebagai Anggota</a>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4" href="/pendaftaran">Informasi Pendaftaran</a>
                        </div> --}}
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="modal" tabindex="-1" id="halaman_panic">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="img/3.jpg" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h4>
                            <h1 class="display-2 caption-title text-capitalize text-white mb-4">PHRI PONTIANAK</h1>
                            <p class="mb-5 fs-5 caption-subtitle">Sistem Digitalisasi Yang Terintegrasi dengan Seluruh
                                Anggota PHRI Kota Pontianak</p>
                            @auth
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            @if (Auth::user()->role_id != 2)
                            
                            @else
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4" href="/halaman_panic">Button Panic</a>
                            @endif

                        </div> --}}
                            @else
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn-hover-bg btn btn-success text-white rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4"
                                        href="/login">Masuk Sebagai Anggota</a>
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 position-relative m-2 m-md-4" href="/pendaftaran">Informasi Pendaftaran</a>
                        </div> --}}
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

    <div class="container-fluid home service py-5">
        {{-- view berita --}}
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Berita</h5>
            <h1 class="mb-0">Berita</h1>
        </div>
        @foreach ($data->take(2) as $loop_data)
            <div class="card mb-5" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center">
                        <div class="responsive-max-300px-container">
                            <img src="{{ $loop_data->take_foto }}" alt="{{ $loop_data->category->name }}"
                                class="img-fluid rounded-start w-100 h-100" alt="image">

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $loop_data->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($loop_data->body), 100, '...') }}</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated
                                    {{ $loop_data->created_at->diffForHumans() }}</small></p>
                        </div>
                        <div class="card-body">
                            <a href="{{ url('/') }}/posts/{{ $loop_data->slug }}"
                                class="d-block mt-4 text-end fs-6 fw-bold">Lihat Lebih Lengkap</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- view informasi --}}

        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Informasi</h5>
                <h1 class="mb-0">Informasi</h1>
            </div>
            <div class="card mb-3" style="max-width: 100%; background-color:#6f6782">
                <div class="row g-0">
                    <div class="col-md-4 mb-3 d-flex d-md-block justify-content-center">
                        <img src="{{ asset('img/build.png') }}" class="img-fluid rounded-start col-9 col-md-12"
                            alt="image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title text-primary">Gabung Sekarang Bersama</h1>
                            <img src="{{ asset('img/phri 1 2.png') }}" class="img-fluid rounded-start" alt="image">
                            <div class="card text-white" style="background-color: #6f6782">
                                <ul>
                                    <h5 class="text-white mb-3">Dapatkan Manfaat Dan Kemudahan Informasi Setelah Menjadi
                                        Anggota PHRI Pontianak</h5>
                                    <li>Diskon Pengiriman barang ke Jakarta</li>
                                    <li>Bantuan Hukum</li>
                                    <li>Pengurusan Perizinan OSS</li>
                                    <li>Bantuan Teknik Kelistrikan</li>
                                    <li>Desain Interior</li>
                                    <li>Supplier</li>
                                    <li>Konsultan Financial Perbankan</li>
                                    <li>Sertifikasi Halal</li>
                                    <li>Button Panic</li>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="{{ url('/register') }}" class="btn btn-warning me-md-5 text-white"
                                            role="button" aria-pressed="true">Daftar Sekarang</a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Layanan</h5>
            <h1 class="mb-0">Layanan</h1>
        </div>
        <div class="row g-4">

            @foreach ($layanan as $key_layanan => $value_layanan)
                <div class="col-12 col-md-6 ">
                    <a href="{{ route('akses_layanan', ['layanan_id' => $value_layanan]) }}">
                        <div class="service-content-inner d-flex align-items-center bg-white rounded p-4 ps-0 h-100">
                            <div class="service-icon p-4">
                                <img src="{{ $value_layanan->take_foto }}" class="mx-auto d-block" style="width:45%">
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">
                                    {{ Str::title($value_layanan->nama) }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-12">
                <div class="text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-2 mb-5" href="{{ url('/layanan') }}">Layanan
                        Lainnya</a>
                </div>
            </div>
        </div>

        {{-- view mitra --}}
        <div class="text-center mb-3">
            <h3 class="mb-5">
                Kemitraan kami
            </h3>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            <div class="col">
                <div class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/maestro-hotel.png') }}" style="width:29%" alt="...">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/neo.png') }}" style="width:50%" alt="...">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/clubhouse.png') }}" style="width:40%" alt="...">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
