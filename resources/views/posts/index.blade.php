@extends('layouts.layout')

@section('content')
    @foreach($posts as $post)
        <div class="card border-0 my-3">
            <div class="card-body">
                <h1 class="card-title text-center"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h1>

                <p class="card-text">{{ $post->body }}</p>
                <p>Created by: <a href="{{ route('users.show', $post->users->username) }}">{{ $post->users->username }}</a>, at {{ $post->created_at }}</p>
            </div>
        </div>
    @endforeach
@endsection