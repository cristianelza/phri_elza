@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kategori Layanan</h1>
        <button class="btn btn-primary mb-3 text-white mb-3" data-bs-toggle="modal" data-bs-target="#BtnModal">Buat Layanan
            Baru</button>
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
                    <th scope="col">No</th>
                    <th scope="col">Kategori Layanan</th>
                    <th style="min-width: 140px">Action</th>
                </tr>
            </thead>
            <tbody id="table-layanan">
                @foreach ($layanan as $layanan)
                    <tr id="index_{{ $layanan->id }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $layanan->nama }}</td>
                        <td>
                            <button class="edit_layanan btn btn-warning btn-sm waves-effect waves-light rounded text-white"
                                data-bs-toggle="modal" data-bs-target="#BtnModalEdit"
                                data-route="{{ route('dashboard.update_layanan', ['id' => $layanan->id]) }}"
                                value="{{ $layanan->id }}" data-toggle="tooltip" data-placement="top" title="Edit"><i
                                    class="fa-solid fa-pen-to-square"></i></button>

                            <a href="javascript:void(0)" id="btn-delete-layanan" data-id="{{ $layanan->id }}"
                                class="btn btn-danger btn-sm waves-effect waves-light rounded text-white"
                                data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa-solid fa-trash">
                                </i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- add mitra Modal -->
    <div class="modal fade" id="BtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kategori Layanan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addLayananForm" action="{{ url('/') }}/dashboard/layanan" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Kategori Layanan <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" required placeholder="masukan nama layanan" autofocus
                                value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Gambar Layanan <span class="text-danger">*</span>
                            </label>
                            <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar"
                                name="gambar" required value="{{ old('gambar') }}">
                            @error('gambar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Deskripsi <span class="text-danger">*</span> </label>
                            @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            <span></span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary addBtn">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal edit layanan -->
    <div class="modal fade" id="BtnModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-body" id="editLayananForm" action="{{ url('/') }}/dashboard/edit_layanan"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul id="updateform_errList"></ul>
                    <input type="hidden" id="editLayanan">
                    <div class="form-group mb-3">
                        <label for="" class="form-label">Nama Layanan <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('edit_nama') is-invalid @enderror"
                            id="edit_nama" name="edit_nama" required placeholder="masukan nama layanan" autofocus
                            value="{{ old('edit_nama') }}">
                        @error('edit_nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Gambar Layanan <span
                                class="text-danger">*</span></label>
                        <input class="form-control @error('edit_gambar') is-invalid @enderror" type="file"
                            id="edit_gambar" name="edit_gambar" required>
                        @error('edit_gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        @error('edit_deskripsi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="3"></textarea>
                        <span></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-white"
                            data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary update_layanan">Update</button>
                    </div>
                </form>
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
            var createDeskripsi, editDeskripsi;
            ClassicEditor
                .create(document.querySelector('#deskripsi'))
                .then(editor => {
                    createDeskripsi = editor;
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#edit_deskripsi'))
                .then(editor => {
                    editDeskripsi = editor;
                })
                .catch(error => {
                    console.error(error);
                });
            $('#tableLayanan').DataTable({
                responsive: true,
                responsive: true,
                scrollY: true,
                paging: false,
                scrollCollapse: true,
                scrollY: '50vh'
            });
            $('[data-toggle="tooltip"]').tooltip();

            $(document).on('click', '.edit_layanan', function(e) {
                e.preventDefault();
                var layanan_id = $(this).val();

                var update_route = $(this).attr('data-route');

                // console.log(layanan_id);
                $.ajax({
                    type: "GET",
                    url: "/dashboard/edit_layanan/" + layanan_id,
                    success: function(response) {
                        // console.log(response);
                        if (response.status == 404) {
                            $('#success_message').html("");
                            $('#success_message').addClass('alert alert-danger');
                            $('#success_message').text(response.message);
                        } else {
                            $('#edit_nama').val(response.layanan.nama);
                            // $('#edit_gambar').val(response.layanan.gambar);
                            // $('#edit_deskripsi').val(response.layanan.deskripsi);
                            $('#editLayanan').val(layanan_id);
                            $('#editLayananForm').attr('action', update_route);
                            $('#BtnModalEdit').modal('show');
                        }
                    }
                });
            });

            $(document).on('submit', '#editLayananForm', function(e) {
                e.preventDefault();
                var data = new FormData(this);
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: data,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    async: true,
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

                            $('#BtnModalEdit').modal('hide');

                        }
                    }
                });
            });

            $('body').on('click', '[id^=btn-delete-layanan]', function() {

                let layanan_id = $(this).data('id');
                let token = $("meta[name='csrf-token']").attr("content");

                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "ingin menghapus data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'TIDAK',
                    confirmButtonText: 'YA, HAPUS!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        // console.log('test');

                        //fetch to delete data
                        $.ajax({

                            url: `/dashboard/layanan/${layanan_id}`,
                            type: "DELETE",
                            cache: false,
                            data: {
                                "_token": token
                            },
                            success: function(response) {

                                //show success message
                                Swal.fire({
                                    type: 'success',
                                    icon: 'success',
                                    title: `${response.message}`,
                                    showConfirmButton: false,
                                    timer: 3000
                                });

                                //remove layanan on table
                                $(`#index_${layanan_id}`).remove();
                            }
                        });
                    }
                });

            });
        });
    </script>
@endsection
