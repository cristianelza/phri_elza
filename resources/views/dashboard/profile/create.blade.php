@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom">
        <h1 class="h5">Lengkapi Data Profile</h1>
    </div>

    <div class="w-100 h-100 p-3 scrollmenu">
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:20px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
        <input type="hidden" name="id" id="id" value="{{ $id }}">
        <!-- One "tab" for each step in the form: -->
        @auth
            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_1" enctype="multipart/form-data" action="" method="POST">
                        @csrf
                        <input type="hidden" name="step_name" value="step_1">
                        <h5 class="text-center">User General Information:</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Jenis Usaha <span class="text-danger">*</span></label>
                                <select id="inputJenisUsaha" class="form-select" name="jenis_usaha" required>
                                    <option value="hotel">Hotel</option>
                                    <option value="restoran">Restoran</option>
                                    <option value="lembaga_pendidikan">Lembaga Pendidikan</option>
                                    <option value="afiliasi_serikat">Afiliasi Serikat</option>
                                    <option value="afiliasi_gabungan">Afiliasi Gabungan</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Kepemilikan <span class="text-danger">*</span></label>
                                <select class="form-select" name="kepemilikan" required>
                                    <option value="berbadan_hukum">Berbadan Hukum</option>
                                    <option value="tidak_berbadan_hukum">Tidak Berbadan Hukum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Nama Usaha <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="nama_usaha" id="nama_usaha"
                                    placeholder="Masukkan nama usaha" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Klasifikasi Usaha <span class="text-danger">*</span></label>
                                <select class="form-select" name="klasifikasi_usaha" id="klasifikasi_usaha" required>
                                    <optgroup label="Hotel">
                                        <option value="b1">*</option>
                                        <option value="b2">**</option>
                                        <option value="b3">***</option>
                                        <option value="b4">****</option>
                                        <option value="b5">*****</option>
                                        <option value="non_b">Non *</option>
                                    </optgroup>
                                    <optgroup label="Restoran">
                                        <option value="rendah">Rendah</option>
                                        <option value="menengah_rendah">Menengah Rendah</option>
                                        <option value="menengah_tinggi">Menengah Tinggi</option>
                                        <option value="tinggi">Tinggi</option>
                                    </optgroup>
                                    <optgroup label="Lainnya">
                                        <option value="lainnya">Lainnya</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="">Alamat <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="alamat" rows="1" name="alamat" placeholder="Masukkan alamat" required></textarea>
                        </div>

                        <div class="col-sm-12">
                            <label for="" class="form-label">Upload Logo <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="logo" name="logo" required>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Provinsi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="provinsi" id="provinsi"
                                    placeholder="Masukkan provinsi" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Kota Kabupaten <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="kota_kabupaten" id="kota_kabupaten"
                                    placeholder="Masukkan Kota / kabupaten" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Kode Pos</label>
                                <input type="number" class="form-control" id="kode_pos" name="kode_pos"
                                    placeholder="Masukkan kode pos" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Telepon <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+62 </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Masukkan no telepon"
                                        name="telepon" id="telepon" aria-describedby="basic-addon1" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Masukkan email" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website" id="website"
                                    placeholder="Masukkan link website" required>
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="-1">Previous</button>
                                <button type="button" onclick="nextPrev(1)" class="mt-2" id="nextBtn">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_2" enctype="multipart/form-data" action="" method="POST"
                        onsubmit="nextPrev(2)">
                        @csrf
                        <input type="hidden" name="step_name" value="step_2">
                        <h5 class="text-center">User Owner PIC:</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Nama Pemilik <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                                    placeholder="Masukkan nama pemilik">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jabatan_pemilik" name="jabatan_pemilik"
                                    placeholder="Masukkan jabatan pemilik">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Identitas <span class="text-danger">*</span></label>
                                <select class="form-select" name="status_no_identitas_pemilik"
                                    id="status_no_identitas_pemilik">
                                    <option value="ktp">KTP</option>
                                    <option value="kitas">Kitas</option>
                                    <option value="passport">Passport</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">No Identitas <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_identitas_pemilik"
                                    id="no_identitas_pemilik" placeholder="Masukkan no identitas pemilik">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Telepon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telepon_pemilik" name="telepon_pemilik"
                                    placeholder="Nomor telepon pemilik">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_pemilik" name="email_pemilik"
                                    placeholder="Email pemilik">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Nama Perwakilan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_perwakilan" name="nama_perwakilan"
                                    placeholder="Nama perwakilan">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jabatan_perwakilan" name="jabatan_perwakilan"
                                    placeholder="Masukkan jabatan perwakilan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Identitas Perwakilan <span class="text-danger">*</span></label>
                                <select class="form-select" name="status_no_identitas_perwakilan"
                                    id="status_no_identitas_perwakilan">
                                    <option value="ktp">KTP</option>
                                    <option value="kitas">Kitas</option>
                                    <option value="passport">Passport</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="">No Identitas Perwakilan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="no_identitas_perwakilan"
                                    id="no_identitas_perwakilan" placeholder="Masukkan no identitas perwakilan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Telepon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="telepon_perwakilan" name="telepon_perwakilan"
                                    placeholder="Nomor telepon perwakilan">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_perwakilan" name="email_perwakilan"
                                    placeholder="Email perwakilan">
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="1">Previous</button>
                                <button type="button" onclick="nextPrev(2)" class="mt-3" id="nextBtn">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_3" enctype="multipart/form-data" action="" method="POST"
                        onsubmit="nextPrev(3)">
                        @csrf
                        <input type="hidden" name="step_name" value="step_3">
                        <h5 class="text-center">User Legal Information:</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="">Nama Badan Hukum Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_badan_hukum"
                                    name="nama_badan_hukum_perusahaan" placeholder="Masukkan nama badan hukum perusahaan">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-12">
                                <label for="" class="form-label">Nomor Akte Pendirian Perusahaan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_akte_pendirian_perusahaan"
                                    name="nomor_akte_pendirian_perusahaan"
                                    placeholder="masukan nomor akte pendirian perusahaan">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-12">
                                <label for="" class="form-label">Nomor NPWP Perusahaan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_npwp_perusahaan"
                                    name="nomor_npwp_perusahaan" placeholder="masukan nomor npwp perusahaan">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-12">
                                <label for="" class="form-label">Nomor Induk Berusaha <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_induk_berusaha"
                                    name="nomor_induk_berusaha" placeholder="masukan nomor induk berusaha">
                            </div>

                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">Nomor Tanda Daftar Usaha Periwisata<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_tanda_daftar_usaha_pariwisata"
                                    name="nomor_tanda_daftar_usaha_pariwisata"
                                    placeholder="masukan nomor tanda daftar usaha pariwisata">
                            </div>
                            <div class="col-md-6">
                                <label for="file_tanda_daftar_usaha_periwisata" class="form-label">File Tanda Daftar Usaha
                                    Pariwisata <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="file_tanda_daftar_usaha_periwisata"
                                    name="file_tanda_daftar_usaha_periwisata" accept=".pdf,.docx,.doc">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="nomor_surat_izin_usaha_pariwisata" class="form-label">Nomor Surat Izin Usaha
                                    Pariwisata</label>
                                <input type="text" class="form-control" id="nomor_surat_izin_usaha_pariwisata"
                                    name="nomor_surat_izin_usaha_pariwisata"
                                    placeholder="masukan nomor surat izin usaha pariwisata">
                            </div>
                            <div class="col-md-6">
                                <label for="file_surat_izin_usaha_pariwisata" class="form-label">File Surat Izin Usaha
                                    Pariwisata <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="file_surat_izin_usaha_pariwisata"
                                    name="file_surat_izin_usaha_pariwisata" accept=".pdf,.docx,.doc">
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label for="" class="form-label">Nomor Surat Izin Usaha Perdagangan <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nomor_surat_izin_usaha_perdagangan"
                                    name="nomor_surat_izin_usaha_perdagangan"
                                    placeholder="masukan nomor surat surat izin usaha perdagangan">
                            </div>
                            <div class="col-md-6">
                                <label for="file_surat_izin_usaha_perdagangan" class="form-label">File Surat Izin Usaha
                                    Perdangangan <span class="text-danger">*</span></label>
                                <input class="form-control" type="file" id="file"
                                    name="file_surat_izin_usaha_perdagangan" accept=".pdf,.docx,.doc">
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="2">Previous</button>
                                <button type="button" class="mt-3" id="nextBtn" onclick="nextPrev(3)">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_4" enctype="multipart/form-data" action=""method="POST"
                        onsubmit="nextPrev(4)">
                        @csrf
                        <input type="hidden" name="step_name" value="step_4">
                        <h5 class="text-center">User Hotel-Summary Information:</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Total Jumlah kamar <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="total_jumlah_kamar" name="total_jumlah_kamar"
                                    placeholder="masukan jumlah kamar">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Ruang Pertemuan <span class="text-danger">*</span></label>
                                <select class="form-select" name="ruang_pertemuan">
                                    <option value="ada">Ada</option>
                                    <option value="tidak_ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="">Total Jumlah Karyawan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="total_jumlah_karyawan"
                                    id="total_jumlah_karyawan" placeholder="masukan jumlah total karyawan">
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="3">Previous</button>
                                <button type="button" class="mt-3" id="nextBtn" onclick="nextPrev(4)">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_5" enctype="multipart/form-data" action="" method="POST"
                        onsubmit="nextPrev(5)">
                        @csrf

                        <input type="hidden" name="step_name" value="step_5">
                        <h5 class="text-center">User Hotel-Room Detail:</h5>
                        <div class="table-responsive text-center">
                            <table class="table table-bordered" id="table">
                                <tr>
                                    <th>Nama Kamar <span class="text-danger">*</span></th>
                                    <th>Tipe Kamar <span class="text-danger">*</span></th>
                                    <th>Jumlah Kamar <span class="text-danger">*</span></th>
                                </tr>
                                <td>
                                    <input type="text" name="nama_kamar" placeholder="masukan nama kamar"
                                        class="form-control">
                                </td>
                                <td>
                                    <select id="tipekamar" name="tipe_kamar[]" class="form-select"
                                        aria-label="Default select example">
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="jumlah_kamar" placeholder="masukan jumlah kamar"
                                        class="form-control">
                                </td>
                            </table>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="4">Previous</button>
                                <button type="button" class="mt-3" id="nextBtn" onclick="nextPrev(5)">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_6" enctype="multipart/form-data" action="" method="POST"
                        onsubmit="nextPrev(6)">
                        @csrf
                        <input type="hidden" name="step_name" value="step_6">
                        <h5 class="text-center">User Meeting-Room Capacity:</h5>
                        <div class="table-responsive text-center">
                            <table class="table table-bordered" id="table">
                                <tr>
                                    <th>Nama Ruangan <span class="text-danger">*</span></th>
                                    <th>Kapasitas Ruangan <span class="text-danger">*</span></th>
                                </tr>
                                <td>
                                    <select id="namaruangan" name="nama_ruangan" class="form-select"
                                        aria-label="Default select example">
                                    </select>
                                </td>
                                <td><input type="number" name="kapasitas" placeholder="masukan kapasitas ruangan"
                                        class="form-control">
                                </td>
                            </table>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="5">Previous</button>
                                <button type="button" class="mt-3" id="nextBtn" onclick="nextPrev(6)">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab">
                <div class="container">
                    <form class="regForm" id="step_7" enctype="multipart/form-data" action="" method="POST"
                        onsubmit="nextPrev(7)">
                        @csrf
                        <input type="hidden" name="step_name" value="step_7">
                        <h5 class="text-center">Employee Detail Information:</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Jumlah Karyawan Tetap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="jumlah_karyawan_tetap"
                                    id="jumlah_karyawan_tetap" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Jumlah Karyawan Kontrak <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jumlah_karyawan_kontrak"
                                    name="jumlah_karyawan_kontrak" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Jumlah Karyawan Harian <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="jumlah_karyawan_harian"
                                    id="jumlah_karyawan_harian" placeholder="">
                            </div>
                            <div class="col-sm-6">
                                <label for="">Jumlah Karyawan OutSource <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="jumlah_karyawan_outsource"
                                    id="jumlah_karyawan_outsource" placeholder="">
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div style="float:right;">
                                <button type="button" id="prevBtn" data-prev="6">Previous</button>
                                <button type="button" class="mt-3" id="nextBtn" onclick="nextPrev(7)">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endauth
    </div>
@endsection

@section('script')
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        $(document).on('click', '#prevBtn', function() {
            let prev = $(this).attr('data-prev');
            nextPrev(prev, "prev");
        });

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            // console.log(x.length);
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n, cmd = "") {
            // console.log(n);
            var data_form = '';
            data_form = new FormData($(`#step_${n}`)[0]);
            // console.log(data_form.get("step_name"));
            var url = '';
            if (data_form.get("step_name") == 'step_1') {
                url = "{{ route('profile_store_step_1', ['id_user' => request()->id_user]) }}";
            }

            if (data_form.get("step_name") == 'step_2') {
                url = "{{ route('profile_store_step_2', ['id_user' => request()->id_user]) }}";
            }

            if (data_form.get("step_name") == 'step_3') {
                url = "{{ route('profile_store_step_3', ['id_user' => request()->id_user]) }}";
            }

            if (data_form.get("step_name") == 'step_4') {
                url = "{{ route('profile_store_step_4', ['id_user' => request()->id_user]) }}";
            }

            if (data_form.get("step_name") == 'step_5') {
                url = "{{ route('profile_store_step_5', ['id_user' => request()->id_user]) }}";
            }
            if (data_form.get("step_name") == 'step_6') {
                url = "{{ route('profile_store_step_6', ['id_user' => request()->id_user]) }}";
            }
            if (data_form.get("step_name") == 'step_7') {
                url = "{{ route('profile_store_step_7', ['id_user' => request()->id_user]) }}";
            }

            $.ajax({
                type: 'POST',
                url: url,
                data: data_form,
                headers: {
                    "status": $(this).attr('data-type'),
                },
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    // console.log(res);

                    // This function will figure out which tab to display
                    var x = document.getElementsByClassName("tab");
                    // Exit the function if any field in the current tab is invalid:
                    // if (n == 1 && !validateForm()) return false;
                    // Hide the current tab:
                    x[currentTab].style.display = "none";
                    // Increase or decrease the current tab by 1:
                    if (cmd == "prev") {
                        if($('#inputJenisUsaha').val() != 'hotel' && currentTab == 5){
                            currentTab = 2;
                        }else{
                            currentTab = currentTab - 1;
                        }
                    } else {
                        var x = document.getElementsByClassName("tab");
                        if (n == (x.length)) {
                            Swal.fire({
                                title: 'Berhasil',
                                icon: 'success',
                                text: 'STEP ' + n + ' Berhasil!',
                                allowOutsideClick: false,
                            }).then(() => {
                                window.location.href = '/dashboard/member';
                            });
                        }
                        Swal.fire({
                            title: 'Berhasil',
                            icon: 'success',
                            text: 'STEP ' + n + ' Berhasil!'
                        })
                        if($('#inputJenisUsaha').val() != 'hotel' && currentTab == 2){
                            currentTab = 5;
                        }else{
                            currentTab = currentTab + 1;
                        }
                    }
                    // if you have reached the end of the form...
                    if (currentTab >= x.length) {
                        // ... the form gets submitted:
                        document.getElementById("regForm").submit();
                        return false;
                    }
                    // Otherwise, display the correct tab:
                    showTab(currentTab);
                },
                statusCode: {
                    400: function(res) {
                        // console.log(res);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: res.responseJSON.message.errorInfo[2],
                            button: true,
                        }).then(() => {
                            // window.location.reload()
                        })
                    },
                    500: function(res) {
                        // console.log(res);
                        Swal.fire({
                            icon: 'error',
                            title: 'Format data',
                            text: res.responseJSON.message,
                            button: true,
                        }).then(() => {
                            // window.location.reload()
                        })
                    }
                }
            })

        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('submit', '#regForm', function(e) {
                e.preventDefault();
                $.ajax({

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


        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                `<tr>
            <td>
                <input type="text" title="iputs[` + i + `][nama_kamar]" placeholder="masukan nama kamar" class="form-control"/>
            </td>
            <td>
                <input type="text" title="iputs[` + i + `][tipe_kamar]" placeholder="masukan tipe kamar" class="form-control"/>
            </td>
            <td>
                <input type="number" title="iputs[` + i + `][jumlah_kamar]" placeholder="masukan jumlah kamar" class="form-control"/>
            </td>
            <td>
                <button type="button" class="btn btn-danger remove-table-row">Remove</button>
            </td>

            </tr>`);
        })

        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        });

        $(document).ready(function() {
            $("#tipekamar").select2({
                placeholder: 'Pilih Tipe kamar',
                ajax: {
                    url: "{{ route('profile_get_tipe_kamar') }}",
                    data: function(params) {
                        var query = {
                            find: params.term,

                        }
                        return query;
                    },
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.title
                                }
                            })
                        }
                    }
                }
            });

        });


        $(document).ready(function() {
            $("#namaruangan").select2({
                placeholder: 'Pilih Nama Ruangan',
                ajax: {
                    url: "{{ route('profile_get_nama_ruangan') }}",
                    data: function(params) {
                        var query = {
                            find: params.term,

                        }
                        return query;
                    },
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.name
                                }
                            })
                        }
                    }
                }
            });

        });

    </script>
@endsection
