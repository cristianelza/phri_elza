@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
    </div>
    <main>
        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        {{-- @if (Auth::user()->status_data == 'belum input')
            <a href="{{ route('profile_create', ['id' => Auth::user()->id]) }}" class="btn btn-primary mb-3">Lengkapi Data</a>
        @elseif(Auth::user()->status_data == 'ditolak')
            <a href="{{ route('profile_create', ['id' => Auth::user()->id]) }}" class="btn btn-primary mb-3">Lengkapi Data</a>
        @endif --}}
        <div class="content" style="overflow-x: hidden;">
            <div class="row d-flex align-items-center">
                <div class="col-sm-2">
                    <h4>Nama</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->username }}" readonly>
                </div>
            </div>

            <div class="row d-flex align-items-center mt-3">
                <div class="col-sm-2">
                    <h4>Email</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->email }}" readonly>
                </div>
            </div>

            <div class="row d-flex align-items-center mt-3">
                <div class="col-sm-2">
                    <h4>Telepon</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->phone ?? '-' }}" readonly>
                </div>
            </div>

            <div class="row d-flex align-items-center mt-3">
                <div class="col-sm-2">
                    <h4>Alamat</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->address }}" readonly>
                </div>
            </div>

            <div class="row d-flex align-items-center mt-3">
                <div class="col-sm-2">
                    <h4>Status Akun</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->status }}" readonly>
                </div>
            </div>
            <div class="row d-flex align-items-center mt-3">
                <div class="col-sm-2">
                    <h4>Alasan Ditolak</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->alasan }}" readonly>
                </div>
            </div>

            <div class="row d-flex align-items-center mt-3">
                <div class="col-sm-2">
                    <h4>Status Data</h4>
                </div>
                <div class="col-sm-1">
                    <h4>:</h4>
                </div>
                <div class="col-sm-4">
                    <input type="text" value="{{ Auth::user()->status_data }}" readonly>
                </div>
            </div>
        </div>
    </main>
@endsection
