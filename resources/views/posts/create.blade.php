@extends('layout')
@section('title', 'Create Post')

@section('content')
<div>
    <h1>Create Blog Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label>Title</label>
        <input class="@error('title') error-border @enderror" type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label>Description</label>
        <textarea class="@error('title') error-border @enderror" name="description" value="{{ old('description') }}"></textarea>
        @error('description')
            <div>
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Submit</button>
    </form>
</div>
@endsection