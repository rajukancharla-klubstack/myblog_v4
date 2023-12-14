@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">

    <h1 style="color: #00796b;">Dashboard</h1>

    @auth
    <p style="color: #512da8;">Welcome, {{ Auth::user()->name }}!</p>
    @endauth

    <h2 style="color: #3b5998;">All Posts</h2>

    @forelse($posts as $post)
    <div class="card mb-3">
        <img src="{{ $post->image }}" class="card-img-top" alt="Post Image" style="max-width: 1080px; max-height: 1080px;">
        <div class="card-body">
            <h5 class="card-title" style="color: #e44d26;">{{ $post->title }}</h5>
            <p class="card-text" style="color: #512da8;">{{ $post->content }}</p>
            <p class="card-text" style="color: #00796b;">Author: {{ $post->user->name }}</p>

            {{-- Display likes count --}}
            <p class="card-text" style="color: #3b5998;">Likes: {{ $post->likes->count() }}</p>

            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <label for="comment_content" style="color: #e44d26;">Add a Comment:</label>
                            <textarea class="form-control" id="comment_content" name="content" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #3b5998;">Comment</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <form method="post" action="{{ route('likes.store') }}">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="btn btn-success" style="background-color: #e44d26; border-color: #e44d26;">Like</button>
                    </form>
                </div>
            </div>

            {{-- Display comments --}}
            <h4 style="color: #00796b;">Comments</h4>
            @forelse($post->comments as $comment)
            <p style="color: #512da8;">{{ $comment->content }} - {{ $comment->user->name }}</p>
            @empty
            <p style="color: #e44d26;">No comments yet.</p>
            @endforelse
        </div>
    </div>
    @empty
    <p style="color: #e44d26;">No posts found.</p>
    @endforelse
</div>
@endsection