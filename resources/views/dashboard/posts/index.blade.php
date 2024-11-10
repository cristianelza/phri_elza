@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Berita Baru</h1>
        <a href="{{ url('/') }}/dashboard/posts/create" class="btn btn-primary mb-3">Buat Berita Baru</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
            <div class="w-100 h-100 p-3">
                <table id="tablePost" class="display">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kategori</th>
                            <th style="min-width: 140px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ ($post->category) ? $post->category->name : '-' }}</td>
                                <td>
                                    <a href="{{ url('/') }}/dashboard/posts/{{ $post->slug }}"
                                        class="btn btn-info btn-sm waves-effect waves-light rounded text-white"
                                        data-toggle="tooltip" data-placement="top" title="Detail"><i
                                            class="fa-solid fa-eye"></i></a>
                                    <a href="{{ url('/') }}/dashboard/posts/{{ $post->slug }}/edit"
                                        class="btn btn-warning btn-sm waves-effect waves-light rounded text-white"data-toggle="tooltip"
                                        data-placement="top" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                    
                                    <form action="{{ url('/') }}/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm waves-effect waves-light rounded text-white"
                                            data-toggle="tooltip" data-placement="top" title="Hapus"
                                            onclick="return confirm('Yakin Ingin Menghapus Data?')"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#tablePost').DataTable({
               responsive:true,
               responsive: true,
                scrollY: true,
                paging: false,
                scrollCollapse: true,
                scrollY: '50vh'
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection

