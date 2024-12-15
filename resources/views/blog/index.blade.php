@extends('layouts.blog')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Blog Posts</h1>

        <div class="d-flex justify-content-between mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">Create New Post</a>
            <form action="{{ route('posts.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search posts" value="{{ request()->get('search') }}" />
                    <button type="submit" class="btn btn-secondary btn-lg ms-2">Search</button>
                </div>
            </form>
        </div>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-light rounded">
                        <!-- Random Image for Post -->
                        <img src="https://picsum.photos/seed/{{ $post->id }}/800/400" class="card-img-top" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $post->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($post->content, 150) }}</p>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info btn-sm">Read More</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
