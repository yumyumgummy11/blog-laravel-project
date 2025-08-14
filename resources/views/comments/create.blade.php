<div>
    <form method="POST" action="{{ route('comments.store', [$post]) }}">
        @csrf
        <input hidden name="post_id" value="{{ $post->id }}">
        <label>Comment</label>
        <textarea class="@error('title') error-border @enderror" name="comment" value="{{ old('comment') }}"></textarea>
        @error('comment')
            <div>
                {{ $message }}
            </div>
        @enderror
        <button type="submit">Post comment</button>
    </form>
</div>
