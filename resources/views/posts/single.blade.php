@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{ route('posts.index') }}">Back</a> | 
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

        <h1>{{ $post->title }}</h1>
        <span>{{ $post->status }}</span> | <span>{{ $post->source }}</span>

        <p class="mt-2">{{ $post->content }}</p>

    </div>
@endsection
