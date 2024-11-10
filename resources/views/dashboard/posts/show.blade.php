@extends('dashboard.layouts.main')

@section('container')
<div class="w-100 h-100 p-3 scrollmenu">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <a href="{{ url('/') }}/dashboard/posts" class="btn btn-info" role="button"><i class="fa-solid fa-arrow-left"></i></a>
                <a href="{{ url('/') }}/dashboard/posts/{{ $post->slug }}/edit" role="button" class="btn btn-warning"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ url('/') }}/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Yakin Ingin Menghapus Data?')"><i
                            class="fa-solid fa-trash"></i></button>
                </form>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . str_replace('public/', '', $post->image)) }}"
                            alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif


                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                {{-- <a href="/posts" class="d-block mt-4">Back To Posts</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
