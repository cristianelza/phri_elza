@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Riwayat Pengaduan</h1>
    </div>
            <div class="w-100 h-100 p-3">
                <table class="display" id="tablePengaduan">
                    <thead>
                        <tr>
                            <th>Waktu Pengaduan</th>
                            <th>Nama Pelapor</th>
                            <th>Waktu Terima</th>
                            <th>Masalah Pelapor</th>
                            <th>Deskripsi Masalah</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            {{-- <th>Status Pengaduan</th> --}}
                            <th>Nama Polisi</th>
                            {{-- <th>Alasan ditolak</th> --}}
                            @if (Auth::user()->role_id === 3)
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanseeder as $item)
                            <tr>
                                <td>{{ $item->tanggal_pengaduan ?? '-' }}</td>
                                <td>{{ $item->nama_pelapor }}</td>
                                <td>{{ $item->waktu_terima_pengaduan
                                    ? \Carbon\Carbon::parse($item->waktu_terima_pengaduan)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('d F Y H:i:s')
                                    : '' }}
                                </td>
                                <td>{{ $item->kelompok_masalah_pengirim }}</td>
                                <td>{{ $item->desckripsi_masalah }}</td>
                                <td>{{ $item->alamat ?? '-' }}</td>
                                <td>
                                    {{ $item->status == 'approve' ? 'diterima' : ($item->status == 'reject' ? 'ditolak' : 'pending') }}
                                </td>
                                {{-- <td>{{ $item->status_pengaduan }}</td> --}}
                                <td>{{ $item->nama_polisi_penerima }}</td>
                                @if (Auth::user()->role_id === 3)
                                    <td>

                                        @if ($item->status == 'pending' || $item->status == '')
                                            <button type="button" class="btn btn-success btn-sm" id="terima_btn"
                                                data-toggle="tooltip" data-placement="top" title="Terima"
                                                route_terima="{{ route('terima_pengaduan', ['id' => $item->id]) }}"
                                                data-id="{{ $item->id }}">
                                                <i class="fa-solid fa-square-check"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success btn-sm" id="terima_btn"
                                                route_terima="{{ route('terima_pengaduan', ['id' => $item->id]) }}"
                                                data-id="{{ $item->id }}" disabled>
                                                <i class="fa-solid fa-square-check"></i>
                                            </button>
                                        @endif

                                        {{-- <button type="button" class="btn btn-info btn-sm" id="edit_btn"
                                            data-toggle="tooltip" data-placement="top" title="Edit"
                                            route_edit="{{ route('edit_pengaduan', ['id' => $item->id]) }}"
                                            data-id="{{ $item->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button> --}}

                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    {{-- Modal terima Pengaduan --}}
    <div class="modal fade" id="pengaduan_terima">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Penerima Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="terima" data-action="">
                        @csrf
                        {{-- <input type="hidden" name="id" id="id"> --}}
                        <label for="">Nama Polisi <span class="text-danger">*</span></label>
                        <input type="text" class="form_control" rows="3" required name="nama_polisi"
                            id="nama_polisi" placeholder="Masukan Nama">

                        <label for="terima_pengaduan">Waktu Terima Pengaduan <span class="text-danger">*</span></label>
                        <input type="datetime-local" id="terima_pengaduan" name="terima_pengaduan" required>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning text-white"
                                data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal edit Pengaduan --}}
    {{-- <div class="modal fade" id="pengaduan_edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_btn">Form Edit Status Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit">
                        @csrf
                        <label for="">Nama Polisi <span class="text-danger">*</span></label>
                        <input type="text" class="form_control" rows="3" required name="nama_polisi"
                            id="nama_polisi" placeholder="Masukan Nama" readonly>

                        <label for="edit_pengaduan">Waktu Terima Pengaduan <span class="text-danger">*</span></label>
                        <input type="datetime-local" id="edit_pengaduan" readonly name="edit_pengaduan" required>

                        <label for="">Status Pengaduan <span class="text-danger">*</span></label>
                        <input type="text" class="form_control" rows="3" required name="status_pengaduan"
                            id="status_pengaduan" placeholder="">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning text-white"
                                data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#tablePengaduan').DataTable({
                responsive:true,
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

            $(document).on('click', '#terima_btn', function() {
                let id = $(this).data('id');
                $('#id').val(id);
                $('#terima').attr('action', '');
                var now = new Date();
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
                $('#terima_pengaduan').val(now.toISOString().slice(0, 16));
                $('#terima').attr('data-action', $(this).attr('route_terima'));
                $('#pengaduan_terima').modal('show');
            });

            $(document).on('submit', '#terima', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('data-action'),
                    type: 'POST',
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: res => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Pegajuan berhasil diterima!',
                            icon: 'success'
                        });
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection


