@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>
            Posts
        </h1>

        <a href="{{ route('posts.import') }}">Import</a>
    </div>
@endsection
