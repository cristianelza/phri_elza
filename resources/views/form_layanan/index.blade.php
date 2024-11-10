@extends('layouts.main')
@section('container')
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
                                            href="{{ url('/pendaftaran') }}">Daftar Sekarang</a>
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
                                            href="/pendaftaran">Daftar Sekarang</a>
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
    <div class="container-fluid home service py-5">
        <h5 class="modal-title" id="exampleModalLabel">{{ ucfirst($layanan->nama) }}</h5>
        <div class="card mb-3" style="max-width: 100%; background-color:#f0eff5">
            <img src="{{ asset('public/img/layanan/' . $layanan->gambar) }}" alt="image" width="250" height="200">
            {!! $layanan->deskripsi !!}
            @if (Auth::user()->status_data == 'diterima')
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" data-bs-toggle="modal" data-bs-target="#ModalPelayanan"
                        type="button">Ajukan Layanan</button>
                </div>
            @else
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" data-bs-toggle="modal" data-bs-target="#ModalPelayanan"
                        type="button" disabled>Ajukan Layanan</button>
                </div>
            @endif

        </div>
    </div>

    <!-- Modal Layanan -->
    <div class="modal fade" id="ModalPelayanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajukan Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="pelayanan">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">User ID</label>
                            <input type="text" id="id" class="form-control" value="{{ Auth::user()->id }}"
                                disabled>
                        </div> --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Kategori Layanan</label>
                            <input type="text" id="kategori_layanan" class="form-control"
                                value="{{ $layanan->nama }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" required id="deskripsi" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary addBtn">Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.addBtn', function(e) {
                $('#pelayanan').submit();
            });

            $(document).on('submit', '#pelayanan', function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: '{{ route('addPelayanan', ['layanan_id' => request()->layanan_id]) }}',
                    method: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.addBtn').prop('disbled', true);
                    },
                    complete: function() {
                        $('.addBtn').prop('disbled', false);
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data berhasil disimpan!',
                                icon: 'success'
                            });
                            location.reload();
                            $('BtnModal').modal('hide');
                        } else if (data.success == false) {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Data gagal disimpan!',
                                icon: 'error'
                            });
                        } else {
                            printValidationErrorMsg(data.msg);
                        }
                    }
                });
            });

            function printValidationErrorMsg(msg) {
                $.each(msg, function(field_name, error) {
                    // console.log(field_name, error);
                    $(document).find('#' + field_name + '_error').text(error);
                });
            }

            function printErrorMsg(msg) {
                $('#alert-danger').html('');
                $('#alert-danger').css('');
                $('#alert-danger').append('' + msg + '');
            }

            function printSuccessMsg(msg) {
                $('#alert-success').html('');
                $('#alert-success').css('display', 'block');
                $('#alert-success').append('' + msg + '');
                document.getElementByid('pelayanan').reset();
            }
        });
    </script>
@endsection
