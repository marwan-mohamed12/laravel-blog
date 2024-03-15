<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::paginate(10);
        return view("posts.index", ['posts' => $posts]);
    }

    public function showPostsTable()
    {
        $posts = Post::all();
        return view('posts.postsTable', ['posts' => $posts]);
    }

    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function showTrashedPosts()
    {
        $trashedPosts = Post::onlyTrashed()->get();
        return view('posts.trash', ['trashedPosts' => $trashedPosts]);
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'enabled' => 'required'
        ]);
        Post::create(['title' => $request->title, 'body' => $request->body, 'enabled' => $request->enabled, 'published_at' => Carbon::now()]);
        return redirect()->route('posts.postsTable')->with('success', 'Post Added successfully');
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'enabled' => 'required'
        ]);

        Post::find($id)->update(['title' => $request->title, 'body' => $request->body, 'enabled' => $request->enabled]);
        return redirect()->route('posts.postsTable', ['success' => 'Post updated successfully']);
    }

    public function destroy(string $id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.postsTable')->with('success', 'Post deleted successfully');
    }
}
