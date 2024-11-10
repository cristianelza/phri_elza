@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Riwayat Layanan</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="success_message"></div>
    <div class="w-100 h-100 p-3">
        <table class="display" id="tableLayanan">
            <thead>
                <tr>
                    <th>Nama Pengaju</th>
                    <th>Waktu Pengajuan</th>

                    <th>Kategori Layanan</th>
                    <th>Status Data</th>
                    <th>Status Layanan</th>
                    <th>Deskripsi</th>
                    @if (Auth::user()->role_id === 1)
                        <th style="min-width: 140px">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($riwayat_layanan as $item)
                    <tr>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ $item->waktu
                            ? \Carbon\Carbon::parse($item->waktu)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('d F Y H:i:s')
                            : '' }}
                        </td>
                        <td>{{ $item->layanan ? $item->layanan->nama : '-' }}</td>
                        <td>
                            @if ($item->status == 'proses' || $item->status == '')
                                {{ $item->status == 'diterima' ? 'diterima' : ($item->status == 'reject' ? 'ditolak' : 'proses') }}
                            @else
                                {{ $item->status == 'diterima' ? 'diterima' : ($item->status == 'reject' ? 'ditolak' : 'proses') }}
                            @endif
                        </td>
                        <td>{{ $item->status_layanan }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        @if (Auth::user()->role_id === 1)
                            <td>
                                @if ($item->status == 'proses' || $item->status == '')
                                    <button class="btn btn-success btn-sm waves-effect waves-light rounded"
                                        data-toggle="tooltip" data-placement="top" title="Terima" id="terima_layanan"
                                        data-id="{{ $item->id }}" data-nama="{{ $item->user->username }}"><i
                                            class="fa-solid fa-square-check"></i></button>
                                @else
                                    <button class="btn btn-success btn-sm waves-effect waves-light rounded"
                                        data-toggle="tooltip" data-placement="top" title="Terima" id="terima_layanan"
                                        data-id="{{ $item->id }}" disabled data-nama="{{ $item->user->username }}"><i
                                            class="fa-solid fa-square-check"></i></button>
                                @endif

                                @if ($item->status == 'diterima' || $item->status == '')
                                    <button class="edit_pelayanan btn btn-warning btn-sm waves-effect waves-light rounded"
                                        data-toggle="tooltip" data-placement="top" data-bs-toggle="modal"
                                        data-bs-target="#edit_Modal"
                                        data-route="{{ route('dashboard.update_pelayanan', ['id' => $item->id]) }}"
                                        data-id="{{ $item->id }}" title="Edit"><i
                                            class="fa-solid fa-pen-to-square"></i></button>
                                @endif
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal edit Pelayanan -->
    <div class="modal fade" id="edit_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body" id="editPelayananForm" action="/dashboard/editPelayanan" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <ul id="updateform_errList"></ul>
                    <input type="hidden" id="editPelayanan">
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Pengaju <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('edit_nama') is-invalid @enderror" id="edit_nama"
                            name="edit_nama" value="" disabled>
                        @error('edit_nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori Layanan <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('edit_kategori') is-invalid @enderror"
                            id="edit_kategori" name="edit_kategori" value="" disabled>
                        @error('edit_kategori')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status Data <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('edit_status_data') is-invalid @enderror"
                            id="edit_status_data" name="edit_status_data" value="" disabled>
                        @error('edit_status_data')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Status Layanan <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('edit_status_layanan') is-invalid @enderror"
                            id="edit_status_layanan" name="edit_status_layanan" value="{{ old('edit_status_layanan') }}"
                            required>
                        @error('edit_status_layanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary update_pelayanan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#tableLayanan').DataTable({
                responsive: true,
                responsive: true,
                scrollY: true,
                paging: false,
                scrollCollapse: true,
                scrollY: '50vh'
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.edit_pelayanan', function(e) {
                e.preventDefault();
                var layanan_id = $(this).data('id');
                var update_route = $(this).attr('data-route');
                // console.log(layanan_id);
                $.ajax({
                    type: "GET",
                    url: "/dashboard/edit_pelayanan/" + layanan_id,
                    beforeSend: () => {
                        $('#edit_kategori').val(null);
                        $('#edit_status_data').val(null);
                        $('#edit_nama').val(null);
                    },
                    success: function(response) {
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_kategori').val(response.riwayat_layanan.layanan.nama);
                            $('#edit_status_data').val(response.riwayat_layanan.status);
                            $('#edit_status_layanan').val(response.riwayat_layanan
                                .status_layanan);
                            $('#edit_nama').val(response.riwayat_layanan.user.username);
                            // $('#edit_gambar').val(response.layanan.gambar);
                            // $('#edit_deskripsi').val(response.layanan.deskripsi);
                            $('#editPelayanan').val(layanan_id);
                            $('#editPelayananForm').attr('action', update_route);
                            $('#edit_Modal').modal('show');
                        }
                    }
                });
            });

            $(document).on('submit', '#editPelayananForm', function(e) {
                e.preventDefault();
                var data = {
                    'kategori': $('#edit_kategori').val(),
                    'status_data': $('#edit_status_data').val(),
                    'status_layanan': $('#edit_status_layanan').val(),
                    'nama': $('#edit_nama').val(),
                }

                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 400) {
                            $('#updateform_errList').html("");
                            $('#updateform_errList').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#updateform_errList').append('<li>' + err_values +
                                    '</li>');
                            });
                        } else if (response.status == 404) {
                            $('#updateform_errList').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                        } else {

                            $('#updateform_errList').html("");
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);

                            $('#edit_Modal').modal('hide');
                            fetchlayanan();
                        }
                    }
                });
            });

            $(document).on('click', '#terima_layanan', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                Swal.fire({
                    icon: 'question',
                    title: "Yakin?",
                    html: '<p>Apakah anda yakin ingin menerima pengajuan layanan</p>' +
                        '<p><b>' + nama + '</b></p>',
                    showCancelButton: true,
                    confirmButtonText: "Terima",
                    cancelButtonText: `Batal`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('terima_layanan') }}',
                            type: 'POST',
                            data: {
                                'id': id,
                                'csrf_token': '{{ csrf_token() }}'
                            },
                            success: res => {
                                if (res.status == true) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: 'Layanan berhasil diterima!',
                                        icon: 'success',
                                        allowOutsideClick: false
                                    }).then(function() {
                                        location.reload();
                                    })
                                } else {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: 'Terjadi Kesalahan',
                                        icon: 'error'
                                    });
                                }
                            }
                        })
                    }
                });
            });
        });
    </script>
@endsection
