@extends('layouts.main')

<!-- Halaman Untuk Nampilkan Categories -->

@section('container')
    <h1 class="mb-3"> Kemitraan Kami </h1>

    <!-- Carousel Start -->
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
                                {{-- <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 2)
                                    @else
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5 BtnModal">Daftar
                                            Sekarang</a>
                                    @endif
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
                                <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 2)
                                    @else
                                        {{-- <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                            href="#">Daftar Sekarang</a> --}}
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
                                    @if (Auth::user()->role_id != 2)
                                    @else
                                        {{-- <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                            href="#">Daftar Sekarang</a> --}}
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

        <div class="card text-center mb-5">
            <div class="card-body" style="background-color:powderblue;">
                <h3>
                    <small class="text-primary">Kami Membuka Peluang Kemitraan Kepada Semua Pihak Untuk Menjadi
                        Kemitraan PHRI Pontianak, Silakan Masukan Penawaran Anda Dibawah Ini.
                    </small>
                </h3>
                <button class="btn-hover-bg btn btn-success text-white mb-3" data-bs-toggle="modal"
                    data-bs-target="#BtnModal">Masukan
                    Penawaran</button>
                {{-- these two spans will display falsh messages --}}
                <span class="alert alert-success" id="alert-success" style="display: none;"></span>
                <span class="alert alert-danger" id="alert-danger" style="display: none;"></span>
            </div>
        </div>

        <!-- add mitra Modal -->
        <div class="modal fade" id="BtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Penawaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addKemitraanForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Nama Perusahaan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_perusahaan"
                                    placeholder="masukan nama perusahaan">
                                <span id="nama_perusahaan_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">No Hp <span class="text-danger">*</span></label>
                                <input type="text" name="nomor_hp" class="form-control" id=""
                                    placeholder="masukan nomor hp">
                                <span id="nomor_hp_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">E-mail <span
                                        class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" id="email"
                                    onblur="duplicateEmail" placeholder="perusahaan@gmail.com">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Penawaran yang akan diberikan <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="penawaran" class="form-control" id="penawaran"
                                    placeholder="masukan nama penawaran">
                                <span id="penawaran_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Upload Proposal Penawaran <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="proposal_penawaran" accept=".pdf,.docx,.doc"
                                    type="file" id="proposal_penawaran">
                                <span id="proposal_penawaran_error" class="text-danger"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Deskripsi Penawaran <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="deskripsi" id="" rows="3"></textarea>
                                <span id="deskripsi_error" class="text-danger"></span>
                            </div>
                            <div class="alert alert-danger" role="alert">
                                *Pastikan Pengisian Biodata dengan Benar
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-white"
                            data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary addBtn">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mb-3">
            <h3 class="mb-5">
                Kemitraan kami
            </h3>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
            <div class="col ">
                <div
                    class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/maestro-hotel.png') }}" style="width:29%" alt="...">
                    </div>
                </div>
            </div>
            <div class="col">
                <div
                    class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/neo.png') }}" style="width:50%" alt="...">
                    </div>
                </div>
            </div>
            <div class="col">
                <div
                    class="service-content-inner d-flex align-items-center bg-white rounded p-4 pe-0">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/clubhouse.png') }}" style="width:40%" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#addKemitraanForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('addKemitraan') }}',
                    data: new FormData(this),
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.addBtn').prop('disabled', true);
                    },
                    complete: function() {
                        $('.addBtn').prop('disabled', false);
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil disimpan, Silakan Tunggu Konfirmasi Admin!',
                                icon: 'success'
                            });
                            location.reload();
                            $('BtnModal').modal('hide');
                        } else if (data.success == false) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: data.msg,
                                icon: 'error'
                            });
                        } else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
                return false;
                // the three functions for flash messages
                function printValidationErrorMsg(msg) {
                    $.each(msg, function(field_name, error) {
                        // console.log(field_name, error);
                        //this will find a input id form error lets create this
                        $(document).find('#' + field_name + '_error').text(error);
                    });
                }

                function printErrorMsg(msg) {
                    $('#alert-danger').html('');
                    $('#alert-danger').css('display', 'block');
                    $('#alert-danger').append('' + msg + '');
                }

                function printSuccessMsg(msg) {
                    $('#alert-success').html('');
                    $('#alert-success').css('display', 'block');
                    $('#alert-success').append('' + msg + '');
                    //if from successfully submitted reset form
                    document.getElementById('addKemitraanForm').reset();
                }
            });
        });
    </script>
@endsection
