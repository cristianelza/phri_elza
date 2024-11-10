@extends('dashboard.layouts.main')

@section('container')
<style>
    .dt-search input{
        width: 50%;
    }
</style>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Data</h1>
    </div>
    <main>

        <body>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li style="cursor: pointer" data-target="general_information" class="nav-item" role="presentation">
                    <a class="nav-link active" aria-current="page">General Information</a>
                </li>
                <li style="cursor: pointer" data-target="owner_pic" class="nav-item" role="presentation">
                    <a class="nav-link" aria-current="page">Owner PIC</a>
                </li>
                <li class="nav-item" style="cursor: pointer" data-target="legal_information" role="presentation">
                    <a class="nav-link" aria-current="page">Legal Information</a>
                </li>
                <li class="nav-item" style="cursor: pointer" data-target="summary_information" role="presentation">
                    <a class="nav-link" aria-current="page">Hotel Summary Information</a>
                </li>
                <li class="nav-item" style="cursor: pointer" data-target="hotel_room_detail" role="presentation">
                    <a class="nav-link" aria-current="page">Hotel Room Detail</a>
                </li>
                <li class="nav-item" style="cursor: pointer" data-target="room_capacity" role="presentation">
                    <a class="nav-link" aria-current="page">Meeting Room Capacity</a>
                </li>
                <li class="nav-item" style="cursor: pointer" data-target="detail_information" role="presentation">
                    <a class="nav-link" aria-current="page">Detail Information</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent" >
                <div id="general_information" class="table-responsive small">
                    <table id="tableDetailData1" class="display">
                        <thead>
                            <tr>
                                <th>Jenis Usaha</th>
                                <th>Logo</th>
                                <th>Kepemilikan</th>
                                <th>Nama Usaha </th>
                                <th>Klasifikasi Usaha</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                                <th>Kota/Kabupaten</th>
                                <th>Kode_Pos</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $item)
                                <tr>
                                    <td>{{ $item->jenis_usaha }}</td>
                                    <td>{{ $item->logo }}</td>
                                    <td>{{ $item->kepemilikan }}</td>
                                    <td>{{ $item->nama_usaha }}</td>
                                    <td>{{ $item->klasifikasi_usaha }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->provinsi }}</td>
                                    <td>{{ $item->kota_kabupaten }}</td>
                                    <td>{{ $item->kode_pos }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->website }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="owner_pic" class="table-responsive small">
                    <table id="tableDetailData2" class="display">
                        <thead>
                            <tr>
                                <th>Nama Pemilik</th>
                                <th>Jabatan</th>
                                <th>NIK</th>
                                <th>Nomor Identitas Kitas</th>
                                <th>Nomor Identitas Passport</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Nama Perwakilan</th>
                                <th>Jabatan Perwakilan</th>
                                <th>Nomor Identitas KTP Perwakilan</th>
                                <th>Nomor Identitas Kitas Perwakilan</th>
                                <th>Nomor Identitas Passport Perwakilan</th>
                                <th>Telepon Perwakilan</th>
                                <th>Email Perwakilan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_owner_pic as $item)
                                <tr>
                                    <td>{{ $item->nama_pemilik }}</td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td>{{ $item->nomor_identitas_ktp }}</td>
                                    <td>{{ $item->nomor_identitas_kitas }}</td>
                                    <td>{{ $item->nomor_identitas_passport }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->nama_perwakilan }}</td>
                                    <td>{{ $item->jabatan_perwakilan }}</td>
                                    <td>{{ $item->nomor_identitas_ktp_perwakilan }}</td>
                                    <td>{{ $item->nomor_identitas_kitas_perwakilan }}</td>
                                    <td>{{ $item->nomor_identitas_passport_perwakilan }}</td>
                                    <td>{{ $item->telepon_perwakilan }}</td>
                                    <td>{{ $item->email_perwakilan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="legal_information" class="table-responsive small">
                    <table id="tableDetailData3" class="display">
                        <thead>
                            <tr>
                                <th>Nama Badan Hukum</th>
                                <th>Nomor Akte Pendirian Perusahaan</th>
                                <th>Nomor NPWP Perusahaan</th>
                                <th>Nomor Induk Berusaha</th>
                                <th>Nomor Tanda Daftar Usaha Pariwisata</th>
                                <th>File Tanda Daftar Usaha Pariwisata</th>
                                <th>Nomor Surat Izin Usaha Pariwisata</th>
                                <th>File Surat Izin Usaha Pariwisata</th>
                                <th>Nomor Surat Izin Usaha Perdagangan</th>
                                <th>File Surat Izin Usaha Perdagangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_legal_information as $item)
                                <tr>
                                    <td>{{ $item->nama_badan_hukum }}</td>
                                    <td>{{ $item->nomor_akte_pendirian_perusahaan }}</td>
                                    <td>{{ $item->nomor_npwp_perusahaan }}</td>
                                    <td>{{ $item->nomor_induk_berusaha }}</td>
                                    <td>{{ $item->nomor_tanda_daftar_usaha_pariwisata }}</td>
                                    <td>{{ $item->file_tanda_daftar_usaha_periwisata }}</td>
                                    <td>{{ $item->nomor_surat_izin_usaha_pariwisata }}</td>
                                    <td>{{ $item->file_surat_izin_usaha_pariwisata }}</td>
                                    <td>{{ $item->nomor_surat_izin_usaha_perdagangan }}</td>
                                    <td>{{ $item->file_surat_izin_usaha_perdagangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="summary_information" class="table-responsive small">
                    <table id="tableDetailData4" class="display">
                        <thead>
                            <tr>
                                <th>Total Jumlah Kamar</th>
                                <th>Ruang Pertemuan</th>
                                <th>Total Jumlah Karyawan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_hotel_sumarry_information as $item)
                                <tr>
                                    <td>{{ $item->total_jumlah_kamar }}</td>
                                    <td>{{ $item->ruang_pertemuan }}</td>
                                    <td>{{ $item->total_jumlah_karyawan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="hotel_room_detail" class="table-responsive small">
                    <table id="tableDetailData5" class="display">
                        <thead>
                            <tr>
                                <th>Nama kamar</th>
                                <th>Jumlah Kamar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_hotel_room_detail as $item)
                                <tr>
                                    <td>{{ $item->nama_kamar }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="room_capacity" class="table-responsive small">
                    <table id="tableDetailData6" class="display">
                        <thead>
                            <tr>
                                <th>Nama_Ruangan</th>
                                <th>Kapasitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user_meeting_room_capacity as $item)
                         
                                <tr>
                                    <td>{{ $item->relation_nama_ruangan->name }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="detail_information" class="table-responsive small">
                    <table id="tableDetailData7" class="display">
                        <thead>
                            <tr>
                                <th>Jumlah karyawan Tetap</th>
                                <th>Jumlah karyawan Kontrak</th>
                                <th>Jumlah karyawan Harian</th>
                                <th>Jumlah karyawan Outsource</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employee_detail_information as $item)
                                <tr>
                                    <td>{{ $item->jumlah_karyawan_tetap }}</td>
                                    <td>{{ $item->jumlah_karyawan_kontrak }}</td>
                                    <td>{{ $item->jumlah_karyawan_harian }}</td>
                                    <td>{{ $item->jumlah_karyawan_outsource }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip()
            $('#tableDetailData1').DataTable();
            $('#tableDetailData2').DataTable();
            $('#tableDetailData3').DataTable();
            $('#tableDetailData4').DataTable();
            $('#tableDetailData5').DataTable();
            $('#tableDetailData6').DataTable();
            $('#tableDetailData7').DataTable();

            $(".table-responsive").hide();
            $('#general_information').show();
            $(".nav-item").on("click", function() {
                $(".table-responsive").hide();
                $('#' + $(this).data('target')).show();

                //Active
                $('.nav-link').removeClass('active');
                $(this).children('.nav-link').addClass('active');
            });
        });
    </script>
@endsection
