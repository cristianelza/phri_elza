@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lowongan Kerja</h1>
    </div>

    <div class="w-100 h-100 p-3">
        <table id="tableLowonganKerja" class="display">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Usia</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Pendidikan</th>
                    <th>Cv</th>
                    <th>Bidang Diminati</th>
                    {{-- @if (Auth::user()->role_id === 1)
                                <th>Action</th>
                            @endif --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongan_kerja as $item)
                    <tr>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->usia }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->pendidikan }}</td>
                        <td>{{ $item->cv }}</td>
                        <td>{{ $item->bidang_diminati }}</td>
                        {{-- @if (Auth::user()->role_id === 1)
                                    <td>

                                    </td>
                                @endif --}}
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
            $('#tableLowonganKerja').DataTable({
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
            });
        });
    </script>
@endsection
