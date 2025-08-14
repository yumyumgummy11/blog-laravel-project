<div>
    @forelse ($comments as $comment)
        @if ($comment->post_id == $post->id)
            <p>{{ $comment->comment }}</p>
        @endif
    @empty
        <p>No Comments</p>
    @endforelse
</div>