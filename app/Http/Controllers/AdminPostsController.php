<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {

        $p = Post::orderBy('created_at', 'DESC')
        -> get();
        $data = ['p' => $p];

        return view('admin.posts.index', $data);
    }




    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request -> all());
        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()
            ->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $post = Post::destroy($id);
        return redirect()->
            route('admin.posts.index');
    }
}
