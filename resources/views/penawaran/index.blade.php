@extends('layouts.main')

@section('container')
    <div class="container">
        <main>
            <div class="py-4 text-center">

                <h2>Form Penawaran</h2>
            </div>
            <div class="container-fluid bg-light service py-5 mb-5">
                <div class="row g-5 justify-content-center">
                    <div class="col-md-7 col-lg-8">
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <main>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Perusahaan</label>
                                        <input type="nama_perusahaan" class="form-control" id="nama_perusahaan"
                                            placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nomor Telpon</label>
                                        <input type="nomor_telpon" class="form-control" id="nama_perusahaan" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">E-mail Perusahaan</label>
                                        <input type="email_perusahaan" class="form-control" id="email_perusahaan"
                                            placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Penawaran yang akan
                                            diberikan</label>
                                        <input type="penawaran" class="form-control" id="penawaran" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFileMultiple" class="form-label">Upload Proposal Penawaran</label>
                                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                            Penawaran</label>
                                        <textarea class="form-control" id="" rows="3"></textarea>
                                    </div>
                                </main>
                            </div>
                            <div class="mb-3 text-end">
                                <button class="w-50 btn btn-primary btn-lg" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
@endsection
