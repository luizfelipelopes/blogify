@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>
            Posts
        </h1>

        <a href="{{ route('posts.import', ['type' => 'blog']) }}">Import Post Blog</a> | 
        <a href="{{ route('posts.import', ['type' => 'product']) }}">Import Post Product</a>
    </div>
@endsection
