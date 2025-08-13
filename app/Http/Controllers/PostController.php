<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostFormRequest;

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

        $post = Post::create($data);

        return redirect()->route('posts.show', [$post])->with('success', 'Post Submited! Title: ' . $post->title . ' Description: ' . $post->description);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, $post)
    {
        $data = $request->validated();

        $post->update($data);

        return redirect()->route('posts.show', [$post])->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home')->with('success', 'Post Deleted');
    }
}
