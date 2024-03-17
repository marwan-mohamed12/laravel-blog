<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Http\Requests\StorePost;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        // User::factory(10)->create();
        $posts = Post::with('user')->paginate(9);
        return view("posts.index", ['posts' => $posts]);
    }

    public function showPostsTable()
    {
        $posts = Post::paginate(10);
        return view('posts.postsTable', ['posts' => $posts]);
    }

    public function show(string $id)
    {
        $post = Post::with('user')->find($id);
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

    public function store(StorePost $request)
    {
        event(new PostCreated(Auth::user()));
        Post::create(['title' => $request->title, 'body' => $request->body, 'enabled' => $request->enabled, 'published_at' => Carbon::now(), 'user_id' => Auth::id()]);
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
