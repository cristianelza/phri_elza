@extends('layouts.main')

@section('container')
    
<div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Silakan Isi Form Pendaftaran Pastikan Data Yang Di Isi Sudah Benar</h2>
      </div>
      <div class="container-fluid bg-light service py-5 mb-5">
      <div class="row g-5 justify-content-center">
        <div class="col-md-7 col-lg-8">
          <form class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-sm-6">
                    <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                    <select class="form-select" name="jenis_usaha_id">
                        <option value="1">One</option>
                    </select>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="provinsi" class="form-label">Provinsi</label>
                    <select class="form-select">
                        <option selected>Provinsi</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="kepemilikan" class="form-label">Kepemilikan</label>
                    <select class="form-select" name="kepemilikan_id">
                        <option value="1">One</option>
                      </select>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="kota-kabupaten" class="form-label">Kota/Kabupaten</label>
                    <select class="form-select" id="country" required>
                  <option value="">Choose...</option>
                  <option>Pontianak</option>
                </select>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="usaha" class="form-label">Nama Usaha</label>
                    <input type="text" class="form-control" id="usaha" placeholder="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="kode_pos" class="form-label">Kode Pos</label>
                    <input type="text" class="form-control" id="kode_pos" placeholder="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="klasifikasi_usaha" class="form-label">Klasifikasi Usaha</label>
                    <select class="form-select" name="kalsifikasi_usaha_id">
                        <option value="1">One</option>
                      </select>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>

                <div class="col-sm-6">
                    <label for="telpon" class="form-label">Telpon</label>
                    <input type="text" class="form-control" id="telpon" placeholder="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                <div class="col-sm-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div> 
                  
                  <div class="col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="">
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>
                <div class="mb-3 text-end">
                    <button class="w-50 btn btn-primary btn-lg" type="submit">Buat Akun</button>
                </div>
          </form>
        </div>
      </div>
      </div>
    </main>
  </div>
</div>

@endsection