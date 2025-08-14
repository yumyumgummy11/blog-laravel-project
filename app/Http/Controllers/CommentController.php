<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        return view('comments.create', ['post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {
        $data = $request->validated();
        
        //$comment = $request->user()->posts()->comments()->create($data);
        $comment = new Comment;
        $comment->user_id = $request->user()->id;
        $comment->post_id = $post->id;
        $comment->comment = $data['comment'];

        $comment->save();
    
        return redirect()->route('posts.show', [$post])->with('success', 'Comment: '. $comment->comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
