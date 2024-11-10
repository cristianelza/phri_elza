@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Akun baru</h1>
    </div>
    <form action="{{ url('/') }}/register" method="POST" id="regForm" class="mt-3">
        @csrf
        <label for="" class="col-sm-2 col-form-label">Username <span class="text-danger">*</span> </label>
        <div class="col-sm-5">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username"
                placeholder="masukan username" required value="{{ old('username') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="" class="col-sm-2 col-form-label">Email address <span class="text-danger">*</span> </label>
        <div class="col-sm-5">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="masukan email" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="" class="col-sm-2 col-form-label">Password <span class="text-danger">*</span> </label>
        <div class="col-sm-5">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                id="password" placeholder="masukan password" required value="{{ old('password') }}">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="" class="col-sm-2 col-form-label">Telepon <span class="text-danger">*</span> </label>
        <div class="col-sm-5">
            <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                placeholder="masukan nomor telepon" required value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <label for="" class="col-sm-2 col-form-label">Alamat <span class="text-danger">*</span> </label>
        <div class="col-sm-5 mb-3">
            <input type="address" name="address" class="form-control @error('address') is-invalid @enderror" id="address"
                placeholder="masukan alamat" required value="{{ old('address') }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-primary  w-40 py-2" id="daftar_akun" type="submit">Daftar Akun</button>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#daftar_akun', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route('member_terima') }}',
                    type: 'POST',
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: res => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Akun berhasil diterima!',
                            icon: 'success'
                        });
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
