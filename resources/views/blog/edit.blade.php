@extends('layouts.blog')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="6" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
@endsection
