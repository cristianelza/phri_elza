@extends('layouts.main')

<!-- Halaman untuk tampilan berita -->

@section('container')
    <h1 class=" mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="{{ url('/posts') }}">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
                <div style="max-height: 350px; overflow:hidden; border-radius: 0.5rem 0.5rem 0 0">
                    <img src="{{ $posts[0]->take_foto }}" alt="{{ $posts[0]->category->name }}" class="responsive">
                </div>
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a href="{{ url('/') }}/posts/{{ $posts[0]->slug }} "
                        class ="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                    <small class="text-body-secondary">
                        By. <a href="{{ url('/') }}/posts?authors={{ $posts[0]->author->username }}"
                            class ="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a
                            href="{{ url('/') }}/posts?categories={{ $posts[0]->category->slug }}"
                            class ="text-decoration-none">
                            {{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a href="{{ url('/') }}/posts/{{ $posts[0]->slug }}"
                    class ="text-decoration-none btn btn-primary">Lihat Lebih
                    Lengkap</a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute bg-dark px-3 py-2 text-white"><a
                                    href="{{ url('/') }}/posts?categories={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}</a></div>

                            @if ($post->image)
                                <div class="responsive-max-300px-container">
                                    <img src="{{ $post->take_foto }}" alt="{{ $post->category->name }}"
                                        class="img-fluid w-100 h-100">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-body-secondary">
                                        By. <a href="posts?author={{ $post->author->username }}"
                                            class ="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="{{ url('/') }}/posts/{{ $post->slug }}" class="btn btn-primary">Lihat
                                    Lebih Lengkap</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
@endsection
