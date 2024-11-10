@extends('layouts.main')

@section('container')
   
<div class="container">
  <main>
    <div class="py-4 text-center">
      <h2>Silakan Isi Form Biodata Pastikan Data Yang Di Isi Sudah Benar</h2>
    </div>
    <div class="container-fluid bg-light service py-5 mb-5">
    <div class="row g-5 justify-content-center">
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <main>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                <input type="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="alamat" class="form-control" id="alamat" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Usia</label>
                <input type="usia" class="form-control" id="usia" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nomor Hp</label>
                <input type="nomor_hp" class="form-control" id="nomor hp" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pendidikan Terkahir</label>
                <input type="pendidikan" class="form-control" id="pendidikan" placeholder="">
              </div>
              <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload CV</label>
                <input class="form-control" type="file" id="formFileMultiple" multiple>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Bidang Kerja Diminati</label>
                <input type="bidang_kerja" class="form-control" id="bidang kerja" placeholder="">
              </div>
            </main>
                </div>
              <div class="mb-3 text-end">
                  <button class="w-50 btn btn-primary btn-lg" type="submit">Kirim</button>
              </div>
        </form>
      </div>
    </div>
  </main>
</div>
</div>
</div>

@endsection