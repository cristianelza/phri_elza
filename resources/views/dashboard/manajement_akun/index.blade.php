@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manajement Akun</h1>
        <a href="{{ url('/') }}/dashboard/manajement_akun/create" class="btn btn-primary mb-3">Buat Akun Baru</a>
    </div>


    <div class="w-100 h-100 p-3">
        <table id="tableAkun" class="table-responsive h-100">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    {{-- <th>Password</th> --}}
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Status Akun</th>
                    {{-- <th>Alasan ditolak</th> --}}
                    <th>Status Data</th>
                    <th style="min-width: 140px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        {{-- <td>{{ $item->password }}</td> --}}
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address ?? '-' }}</td>
                        <td>{{ $item->status ?? '-' }}</td>
                        <td>{{ $item->status_data ?? '-' }}</td>
                        <td>

                            @if ($item->status_data == 'menunggu')
                                <button class="btn btn-success btn-sm waves-effect waves-light rounded" data-toggle="tooltip"
                                    data-placement="top" title="Terima" id="terima_pengajuan_data"
                                    data-id="{{ $item->id }}" data-nama="{{ $item->username }}"><i
                                        class="fa-solid fa-square-check"></i></button>

                                <button class="btn btn-sm btn-danger waves-effect waves-light rounded" id="tolak_btn"
                                    data-id="{{ $item->id }}" data-nama="{{ $item->username }}"><i
                                        class="fa-solid fa-square-xmark" data-toggle="tooltip" data-placement="top"
                                        title="Tolak"></i></button>
                                {{-- <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-info"><i
                                                class="fa-solid fa-eye"></i></a> --}}
                            @else
                                <button class="btn btn-success btn-sm waves-effect waves-light rounded"
                                    data-toggle="tooltip" data-placement="top" title="Terima" id="terima_pengajuan_data"
                                    data-id="{{ $item->id }}" data-nama="{{ $item->username }}" disabled><i
                                        class="fa-solid fa-square-check"></i></button>

                                <button class="btn btn-sm btn-danger waves-effect waves-light rounded" id="tolak_btn"
                                    data-id="{{ $item->id }}" data-nama="{{ $item->username }}" disabled><i
                                        class="fa-solid fa-square-xmark" data-toggle="tooltip" data-placement="top"
                                        title="Tolak"></i></button>
                            @endif

                            @if ($item->status == 'active')
                                <a href="{{ route('show.akun_user', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning waves-effect waves-light rounded text-white"
                                    data-toggle="tooltip" data-placement="top" title="Detail" id="show"
                                    data-id="{{ $item->id }}" data-name="{{ $item->username }}"><i
                                        class="fa-solid fa-eye"></i></a>
                            @else
                                <a href="{{ route('show.akun_user', ['id' => $item->id]) }}"
                                    class="btn btn-sm btn-warning waves-effect waves-light rounded text-white"
                                    data-toggle="tooltip" data-placement="top" title="Detail" id="show"
                                    data-id="{{ $item->id }}" data-name="{{ $item->username }}"><i
                                        class="fa-solid fa-eye"></i></a>
                            @endif

                            {{-- <td>{{ $item->alasan ?? '-' }}</td> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




    <!-- add detail Modal -->
    <div class="modal fade" id="BtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content" style="overflow-x: hidden;">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-3">
                                <h4>Nama</h4>
                            </div>
                            <div class="col-sm-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama" value="{{ Auth::user()->username }}" readonly>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-sm-3">
                                <h4>Email</h4>
                            </div>
                            <div class="col-sm-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="email" value="{{ Auth::user()->email }}" readonly>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-sm-3">
                                <h4>Telepon</h4>
                            </div>
                            <div class="col-sm-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="telepon" value="{{ Auth::user()->phone ?? '-' }}" readonly>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-sm-3">
                                <h4>Alamat</h4>
                            </div>
                            <div class="col-sm-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="alamat" value="{{ Auth::user()->address }}" readonly>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-sm-3">
                                <h4>Status Akun</h4>
                            </div>
                            <div class="col-sm-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="status_akun" value="{{ Auth::user()->status }}" readonly>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center mt-3">
                            <div class="col-sm-3">
                                <h4>Status Data</h4>
                            </div>
                            <div class="col-sm-1">
                                <h4>:</h4>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="status_data" value="{{ Auth::user()->status_data }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning text-white" data-bs-dismiss="modal">Kembali</button>
                    {{-- <button type="submit" class="btn btn-primary addBtn">Simpan</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alasan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tolak">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <label for="">Alasan <span class="text-danger"></span></label>
                        <textarea class="form-control" name="alasan" id="alasan" rows="3"></textarea>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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
            $('[data-toggle="tooltip"]').tooltip()
            $('#tableAkun').DataTable({
                responsive: true,
                scrollY: true,
                paging: false,
                scrollCollapse: true,
                scrollY: '50vh'
                // autoWidth: true,
                // lengthChange: true
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '#terima_pengajuan_data', function() {
                let id = $(this).data('id');
                let nama = $(this).data('nama');
                Swal.fire({
                    icon: 'question',
                    title: "Yakin?",
                    html: '<p>Apakah anda yakin ingin menerima pengajuan data</p>' +
                        '<p><b>' + nama + '</b></p>',
                    showCancelButton: true,
                    confirmButtonText: "Terima",
                    cancelButtonText: `Batal`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('manajement_akun_terima') }}',
                            type: 'POST',
                            data: {
                                'id': id,
                                'csrf_token': '{{ csrf_token() }}'
                            },
                            success: res => {
                                if (res.status == true) {
                                    Swal.fire({
                                        title: 'Berhasil!',
                                        text: 'Data berhasil diterima!',
                                        icon: 'success'
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

            $(document).on('click', '#tolak_btn', function() {
                let id = $(this).data('id');
                $('#id').val(id);
                $('#alasan').modal('show');
            });

            $(document).on('click', '[id^=show]', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('href'),
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $('#BtnModal .modal-body .content .row').find('.col-sm-7 input').val(
                            null);

                    },
                    success: function(data) {
                        if (data) {
                            console.log(data);
                            $('#BtnModal .modal-body .content .row').find('.col-sm-7 input')
                                .map(function(key, item) {


                                    if ($(item).attr('id') == 'nama') {
                                        $(item).val(data.username)
                                    }
                                    if ($(item).attr('id') == 'email') {
                                        $(item).val(data.email)
                                    }
                                    if ($(item).attr('id') == 'telepon') {
                                        $(item).val(data.phone)
                                    }
                                    if ($(item).attr('id') == 'alamat') {
                                        $(item).val(data.address)
                                    }
                                    if ($(item).attr('id') == 'status_akun') {
                                        $(item).val(data.status)
                                    }
                                    if ($(item).attr('id') == 'status_data') {
                                        $(item).val(data.status_data)
                                    }
                                })
                            $('#BtnModal').modal('show');
                        }
                    }

                })
            })

            $(document).on('submit', '#tolak', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('manajement_akun_tolak') }}',
                    type: 'POST',
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: res => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Pegajuan berhasil ditolak!',
                            icon: 'success'
                        });
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
