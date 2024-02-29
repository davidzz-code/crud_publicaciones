<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create(): View
    {
        return view('post.create');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        
        $post = new Post;
        $post->title = $request->title;
        $post->extract = $request->extract;
        $post->content = $request->content;
        $post->expirable = $request->expirable;
        $post->commentable = $request->commentable;
        $post->access = $request->access;
        $post->user_id = Auth::id();
        
        abort_unless(Gate::allows('create-post', $post), 403);

        $post->save();
        
        return redirect()->route('post.index');
    }

    public function show(Post $post): View
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        return view('post.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        abort_unless(Gate::allows('edit-post', $post), 403);

        $post->update($request->all());
        return redirect()->route('post.index');

    }

    public function destroy(Post $post): RedirectResponse
    {
        abort_unless(Gate::allows('delete-post', $post), 403);

        $post->delete();
        return redirect()->route('post.index');
    }
}
