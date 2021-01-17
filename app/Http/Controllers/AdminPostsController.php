<?php

namespace App\Http\Controllers;
use App\Models\Post;

class AdminPostsController extends Controller
{
    public function index()
    {

        $po = Post::orderBy('created_at', 'DESC')
        -> get();
        $data = ['p' => $po];

        return view('admin.posts.index', $data);
    }




    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
    }

    public function edit($id)
    {
        $data = ['id' => $id];

        return view('admin.posts.edit', $data);
    }
}
