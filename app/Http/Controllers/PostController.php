<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(Request $request): View
    {
        return $this->postsView($request->search ? ['search' => $request->search] : []);
    }

    public function postsByCategory(Category $category): View
    {
        return $this->postsView(['category' => $category]);
    }

    public function postsByTag(Tag $tag): View
    {
        return $this->postsView(['tag' => $tag]);
    }


    protected function postsView(array $filters): View
    {
        return view('posts.index', [
            'posts' => Post::filters($filters)->latest()->paginate(10),
        ]);
    }


    public function show(Post $post): view
    {

        return view('posts.show', compact('post'));
    }
}
