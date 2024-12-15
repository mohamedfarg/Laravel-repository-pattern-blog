@extends('layouts.blog')

@section('content')
    <div class="container">
        <h1 class="my-4">Create a New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter post title" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="6" placeholder="Write your post content here..." required></textarea>
            </div>

            <button type="submit" class="btn btn-success mt-3">Save Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3 ml-2">Cancel</a>
        </form>
    </div>
@endsection
