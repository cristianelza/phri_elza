@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Akun baru</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="container-fluid bg-light service py-5 mb-3">
                <main class="form-registration w-100 m-auto">
                    <h1 class="h5 mb-3 fw-normal text-center">Form Akun Baru</h1>
                    <form action="{{ url('/') }}/register" method="POST">
                        @csrf
                        {{-- <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div> --}}

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                        @endif

                        <label for="username">UserName</label>
                        <div class="form-floating mb-3">
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="UserName" required value="{{ old('username') }}">
                            <label for="username">UserName</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="email">Email address</label>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="password" required>Password</label>
                        <div class="form-floating mb-3">
                            <input type="password" name="password"
                                class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                                placeholder="Password">
                            <label for="password" required>Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="phone">Phone</label>
                        <div class="form-floating mb-3">
                            <input type="phone" name="phone"
                                class="form-control rounded-bottom @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Password">
                            <label for="phone">Phone</label>
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="address" required>Address</label>
                        <div class="form-floating mb-3">
                            <input type="address" name="address"
                                class="form-control rounded-bottom @error('address') is-invalid @enderror" id="address"
                                placeholder="Alamat">
                            <label for="address" required>Address</label>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary mt-3 w-100 py-2" type="submit">Daftar Akun</button>
                    </form>
                    {{-- <small class="d-block text-center mt-3">Sudah Registrasi? <a href="/login">Login</a></small> --}}
                </main>
            </div>
        </div>
    </div>
@endsection
