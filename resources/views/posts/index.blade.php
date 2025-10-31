@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>
            Posts
        </h1>

        <div class="mb-3">
            <a href="{{ route('posts.import', ['type' => 'blog']) }}">Import Post Blog</a> | 
            <a href="{{ route('posts.import', ['type' => 'product']) }}">Import Post Product</a>
        </div>

        @foreach ($posts as $post)
            
            <a class="link-dark link-opacity-75-hover text-reset text-decoration-none" href="{{ route('posts.show', $post->id) }}">
                <div class="bg-body-tertiary p-3 mb-3 ">
                    <p><span class="fw-bold">Title: </span>{{ $post->title }}</p>
                    <p><span class="fw-bold">Content: </span>{{ $post->content }}</p>
                    <p><span class="fw-bold">Status: </span>{{ ucfirst($post->status) }}</p>
                    <p><span class="fw-bold">Source: </span>{{ $post->source }}</p>
                </div>
            </a>
            

        @endforeach


    </div>
@endsection
