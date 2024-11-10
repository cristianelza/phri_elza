{{-- @extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Layanan</h1>
    </div>

    <main>

        <body>
            <form action="{{ route('dashboard.update_layanan', $layanan->id) }}" method="POST" enctype="multipart/form-data"
                id="regForm">
                @csrf
                @method('put')
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Nama Layanan <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" required placeholder="masukan nama layanan" autofocus value="{{ old('nama') }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="" class="form-label">Gambar Layanan <span class="text-danger">*</span></label>
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar"
                        name="gambar" required value="{{ old('gambar') }}">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    @error('deskripsi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    <span></span>
                </div>
                <button type="submit" class="btn btn-primary mt-3 py-2">Update</button>
            </form>
        </body>
    </main>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
