<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('pages.index')->with('posts', $posts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userPosts()
    {
        $posts = Post::all()->where('user_id', '=', auth()->user()->id);

        return view('pages.dashboard')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|max:8096'
        ]);

        $blog = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'score' => 0,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()
            ->route('blog.show', $blog)
            ->with('success', 'Článek vytvořen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Post $blog)
    {
        $comments = Comment::with('post')
            ->where('post_id', '=', $blog->getAttribute('id'))
            ->get();

        return view('pages.showPost')->with(['post' => $blog, 'comments' => $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        Gate::denyIf(fn () => auth()->user()->getAuthIdentifier() != $blog->user->id);

        return view('pages.editPost')->with('post', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $blog)
    {
        $attributes = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:8096'
        ]);

        $blog->update($attributes);

        return redirect()->route('blog.show', $blog)
            ->with('success', 'Článek upraven');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        $blog->delete();

        return redirect()->route('index');
    }
}
