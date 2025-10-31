@extends('layouts.master')

@section('content')
    <div class="container">
        <a href="{{ route('posts.index') }}">Back</a> | 
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a> | 
        <form action="{{ route('posts.delete', $post->id) }}"  method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>    
        </form> 

        <h1>{{ $post->title }}</h1>
        <span>{{ ucfirst($post->status) }}</span> | <span>{{ $post->source }}</span>

        <p class="mt-2">{{ $post->content }}</p>

    </div>
@endsection
