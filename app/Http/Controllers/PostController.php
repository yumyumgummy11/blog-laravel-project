<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = $request->user()->posts()->create($data);
    
        return redirect()->route('posts.show', [$post])->with('success', 'Post Submited! Title: ' . $post->title . ' Description: ' . $post->description);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = Comment::all();

        return view('posts.show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $test, PostFormRequest $request, Post $post) 
    {
        if ($test->user()->cannot('update', $post)) {
            abort(403);
        }
        $data = $request->validated();

        $post->update($data);

        return redirect()->route('posts.show', [$post])->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        if ($request->user()->cannot('delete', $post)) {
            abort(403);
        }
        $post->delete();

        return redirect()->route('home')->with('success', 'Post Deleted');
    }
}
