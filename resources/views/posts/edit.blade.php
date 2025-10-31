@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="post-name" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="post-title"
                               value="{{ old('title') ?? $post->title }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="post-content" class="form-label">Content</label>
                        <input type="content" name="content" class="form-control" id="post-content"
                               value="{{ old('content') ?? $post->content }}">
                        @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="post-status" class="form-label">Status</label>
                        <input type="status" name="status" class="form-control" id="post-status"
                        value="{{ old('status') ?? $post->status }}">
                        @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                
                    <div class="d-flex justify-content-between align-items-center">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
