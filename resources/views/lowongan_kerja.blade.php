@extends('layouts.main')

<!-- Halaman Untuk Nampilkan Categories -->

@section('container')
    <h1 class="mb-3"> Lowongan Kerja </h1>

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
                            {{-- <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 2)
                                    @else
                                    @endif
                                    <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="#">Daftar Sekarang</a>
                                </div> --}}
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
                            {{-- <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->role_id != 2)
                                    @else
                                    @endif
                                    <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="#">Daftar Sekarang</a>
                                </div> --}}
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/carousel-3.jpg') }}" class="img-fluid" alt="Image">
                    <div class="carousel-caption">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;"></h4>
                            <h1 class="display-2 text-capitalize text-white mb-4">PHRI PONTIANAK</h1>
                            <p class="mb-5 fs-5">Sistem Digitalisasi Yang Terintegrasi dengan Seluruh Anggota PHRI Kota
                                Pontianak
                                {{-- <div class="d-flex align-items-center justify-content-center">
                                    @if (Auth::user()->user != 2)
                                    @else
                                    @endif
                                    <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5"
                                        href="#">Daftar Sekarang</a>
                                </div> --}}
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
        <h1 class="mb-3"> Informasi Lowongan Kerja </h1>

        <div class="card text-center mb-5">
            <div class="card-body" style="background-color:powderblue;">
                <h3>
                    <small class="text-primary">PHRI Pontianak Memiliki Ratusan Anggota Hotel, Restoran Dan cafe Di
                        Pontianak
                        Masukan Biodata kamu Dalam Form Dibawah Ini Untuk Kesempatan Berkarir Di Salah Satu Anggota PHRI
                        Pontianak
                        Kalimantan Barat
                    </small>
                </h3>
                {{-- @if (Auth::user()->role_id != 2)
                @else
                @endif --}}
                <button class="btn-hover-bg btn btn-success text-white" data-bs-toggle="modal"
                    data-bs-target="#BtnModal">Isi
                    Biodata</button>
                {{-- these two spans will display falsh messages --}}
                <span class="alert alert-success" id="alert-success" style="display: none;"></span>
                <span class="alert alert-danger" id="alert-danger" style="display: none;"></span>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="BtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Lowongan Kerja</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addLokerForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">Nama Lengkap <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_lengkap" id=""
                                    placeholder="masukan nama lengkap">
                                <span id="nama_lengkap_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Alamat <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="alamat" id=""
                                    placeholder="masukan alamat">
                                <span id="alamat_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Usia <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="usia" id=""
                                    placeholder="masukan usia">
                                <span id="usia_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Nomor Hp <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nomor_hp" id=""
                                    placeholder="masukan nomor hp">
                                <span id="nomor_hp_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">E-mail <span
                                        class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    onblur="duplicateEmail" placeholder="name@gmail.com">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Pendidikan Terkahir <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="pendidikan" id=""
                                    placeholder="masukan pendidikan">
                                <span id="pendidikan_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Upload CV <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" name="cv" accept=".pdf,.docx,.doc" type="file"
                                    placeholder="masukan cv" id="">
                                <span id="cv_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Bidang kerja Diminati <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="bidang_diminati" class="form-control mb-3" id=""
                                    placeholder="masukan bidang kerja">
                                <span id="bidang_diminati_error" class="text-danger"></span>
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
            $('#addLokerForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('LowonganKerja') }}',
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
                    document.getElementById('addLokerForm').reset();
                }
            });
        });
    </script>
@endsection
