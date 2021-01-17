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
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }
}
