@extends('layout')
@section('title', 'Update Post'. $post->title)

@section('content')
<div>
    <h1>Update Post {{ $post->title }}</h1>
    <form method="POST" action="{{ route('posts.update', [$post]) }}">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input class="@error('title') error-border @enderror" type="text" name="title" value="{{ old('title', $post->title) }}">
        @error('title')
            <div>
                {{ $message }}
            </div>
        @enderror

        <label>Description</label>
        <textarea class="@error('title') error-border @enderror" name="description" value="{{ old('description', $post->description) }}"></textarea>
        @error('description')
            <div>
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Update</button>
    </form>
</div>
@endsection