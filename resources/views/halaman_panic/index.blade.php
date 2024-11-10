@extends('layouts.main')

@section('container')
    <h1 class="mb-3"> Halaman Panic </h1>

    <h5>Pilih Berdasarkan Kebutuhan :</h5>

    {{-- <div class="mb-3 text-end">
        <a href="/halaman_riwayat_pengaduan">
            <button type="submit" class="btn btn-primary">Riwayat Pengaduan</button></a>
    </div> --}}

    @if (Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="container-fluid bg-light service py-5 mb-5">
        <div class="row">
            @foreach ($master_masalah as $m)
                <div class="col mb-4">
                    {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
                    <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded cursor-pointer p-4"
                        data-nama="{{ $m->nama }}" id="halaman_panic">
                        <div class="card-img"><img src="{{ asset('/') }}img/{{ $m->gambar }}" class="rounded mx-auto d-block"
                                alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $m->nama }}</h5>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
            @endforeach

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pengaduan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="halaman_panic_post" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-3">
                            <main>
                                <div class="mb-3">
                                    <label for="nama_pelapor">Nama Pelapor</label>
                                    <input type="text" name="nama_pelapor" class="form-control" value=""
                                        id="nama_pelapor" placeholder="" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="kelompok_masalah">Kelompok Masalah Pengirim</label>
                                    <input type="text" name="kelompok_masalah_pengirim" class="form-control"
                                        value="" id="kelompok_masalah" placeholder="" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="kelompok_masalah">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ auth()->user()->role_id == 2 ? auth()->user()->address : '' }}"
                                        id="alamat" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label for="desckripsi_masalah" class="form-label">Deskripsi Kejadian</label>
                                    <textarea class="form-control" name="desckripsi_masalah" required id="desckripsi_masalah" rows="3"></textarea>
                                </div>
                            </main>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning text-white"
                                data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary" id="showmessage">Kirim</button>
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
            $(document).on('click', '#halaman_panic', function() {
                let nama = $(this).data('nama');
                let url = '{{ route('get_data', ':nama') }}';
                url = url.replace(':nama', nama);
                $.ajax({
                    url: url,
                    type: 'GET',
                    cache: false,
                    beforeSend: () => {
                        $('#nama_pelapor').val(null);
                        $('#kelompok_masalah').val(null);
                        $('#exampleModal').modal('show');
                    },
                    success: res => {
                        $('#nama_pelapor').val(res.user);
                        $('#kelompok_masalah').val(res.master.nama);
                    }
                });
            });
        });
    </script>
@endsection
