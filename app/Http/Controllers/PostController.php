<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index():view
    {
        $posts = Post::latest()->paginate(2);
        $total = Post::count();
        // $posts = Post::all();
        // return view('posts.index',[
        // 'posts' => $posts,
        //  'total' => $total
        //  ]);
        return view('posts.index',compact('posts', 'total') );
    }

    public function show(Post $post):view
    {
       
        return view('posts.show', compact('post'));
    }
}