@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ Str::limit('Hi, ' . auth()->user()->username, 18, '...') }}
    </div>
    <main>
      <body>
        <div class="row mt-5">
            @if (Auth::user()->role_id === 2)
                <div class="col-lg-4">
                    <div class="card-data perampokan mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-bell-concierge"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Pelayanan</div>
                                {{-- <div class="card-count">{{ $data_panic['perampokan'] }}</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 1)
                <div class="col-lg-4">
                    <div class="card-data perampokan mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-people-robbery"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Perampokan</div>
                                <div class="card-count">{{ $data_panic['perampokan'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 3)
                <div class="col-lg-4">
                    <div class="card-data perampokan mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-people-robbery"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Perampokan</div>
                                <div class="card-count">{{ $data_panic['perampokan'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 2)
                <div class="col-lg-4">
                    <div class="card-data riwayat_pengaduan mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-fire"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Riwayat Pengaduan</div>
                                {{-- <div class="card-count">{{ $data_panic['perkelahian'] }}</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 1)
                <div class="col-lg-4">
                    <div class="card-data perkelahian mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-fire"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Perkelahian</div>
                                <div class="card-count">{{ $data_panic['perkelahian'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 3)
                <div class="col-lg-4">
                    <div class="card-data perkelahian mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-fire"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Perkelahian</div>
                                <div class="card-count">{{ $data_panic['perkelahian'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 1)
                <div class="col-lg-4">
                    <div class="card-data lainnya mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-list"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Lainnya</div>
                                <div class="card-count">{{ $data_panic['lainnya'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role_id === 3)
                <div class="col-lg-4">
                    <div class="card-data lainnya mb-3">
                        <div class="row">
                            <div class="col-6"><i class="fa-solid fa-list"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Lainnya</div>
                                <div class="card-count">{{ $data_panic['lainnya'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
      </body>
    </main>
@endsection
