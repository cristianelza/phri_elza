@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Akun Member</h1>
    </div>


    <div class="w-100 h-100 p-3">
        <table id="tableMember" class="display">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    {{-- <th>Password</th> --}}
                    <th>Phone</th>
                    <th>Alamat</th>
                    <th>Status Akun</th>
                    <th>Status Data</th>
                    @if (Auth::user()->role_id === 1)
                        <th style="min-width: 140px">Action</th>
                    @endif
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
                            @if ($item->status == 'inactive')
                                <button class="btn btn-success btn-sm waves-effect waves-light rounded" data-toggle="tooltip"
                                    data-placement="top" title="Terima" id="terima_member" data-id="{{ $item->id }}"
                                    data-nama="{{ $item->username }}"><i class="fa-solid fa-square-check"></i></button>
                                {{-- <button class="btn btn-sm btn-danger waves-effect waves-light rounded" id="tolak_btn" data-id="{{ $item->id }}" data-nama="{{ $item->username}}">Tolak</button> --}}
                            @else
                                <button class="btn btn-success btn-sm waves-effect waves-light rounded"
                                    data-toggle="tooltip" data-placement="top" title="Terima" disabled><i
                                        class="fa-solid fa-square-check"></i></button>
                            @endif

                            @if ($item->status_data == 'belum input')
                                <a href="{{ route('profile_create', ['id_user' => $item->id]) }}"
                                    class="btn btn-primary btn-sm waves-effect waves-light rounded" role="button"
                                    data-toggle="tooltip" data-placement="top" title="Lengkapi Data"><i
                                        class="fa-solid fa-database"></i></a>
                            @else
                                <a href="{{ route('profile_create', ['id_user' => $item->id]) }}"
                                    class="btn btn-primary btn-sm waves-effect waves-light rounded disabled" role="button"
                                    data-toggle="tooltip" data-placement="top" title="Lengkapi Data"><i
                                        class="fa-solid fa-database"></i></a>

                                <a class="btn btn-info btn-sm waves-effect waves-light rounded text-white"data-toggle="tooltip"
                                    data-placement="top" title="Detail Data"
                                    href="/dashboard/member/detail/{{ $item->id }}" role="button"><i
                                        class="fa-solid fa-eye"></i></a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('#tableMember').DataTable({
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

            $(document).on('click', '#tolak_btn', function() {
                let id = $(this).data('id');
                $('#id').val(id);
                $('#alasan').modal('show');
            });

            $(document).on('submit', '#tolak', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('member_tolak_btn') }}',
                    type: 'POST',
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: res => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Akun berhasil ditolak!',
                            icon: 'success'
                        });
                        location.reload();
                    }
                });
            });

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '#terima_member', function() {
                    let id = $(this).data('id');
                    let nama = $(this).data('nama');
                    Swal.fire({
                        icon: 'question',
                        title: "Yakin?",
                        html: '<p>Apakah anda yakin ingin menerima akun member</p>' +
                            '<p><b>' + nama + '</b></p>',
                        showCancelButton: true,
                        confirmButtonText: "Terima",
                        cancelButtonText: `Batal`
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '{{ route('member_terima') }}',
                                type: 'POST',
                                data: {
                                    'id': id,
                                    'csrf_token': '{{ csrf_token() }}'
                                },
                                success: res => {
                                    if (res.status == true) {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: 'Akun berhasil diterima!',
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
                })
            });
        });
    </script>
@endsection
