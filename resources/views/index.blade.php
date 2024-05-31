@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Your Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mt-4">
        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
