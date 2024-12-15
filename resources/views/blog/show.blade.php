@extends('layouts.blog')

@section('content')
    <div class="container">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="text-muted">Published on: {{ $post->created_at->format('F j, Y') }}</p>
                <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
