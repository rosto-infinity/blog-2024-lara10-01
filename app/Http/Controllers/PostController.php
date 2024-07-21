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
    public function index(request $request): view
    {

        $posts = Post::query();

        if ($search = $request->search) {
            $posts->where(
                fn (Builder $query) => $query
                    ->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('content', 'LIKE', '%' . $search . '%')
            );
        }

        $posts = $posts->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function postsByCategory(Category $category): View
    {
        return View('posts.index', [
            // 'posts' => $category->posts()->latest()->paginate(7),

            'posts' => Post::where(
                'category_id',
                $category->id
            )->latest()->paginate(10),
        ]);
    }

    public function postsByTag(Tag $tag): View
    {
        return View('posts.index', [
            // 'posts' => $category->posts()->latest()->paginate(7),

            'posts' => Post::whereRelation(
                'tags',
                // 'id',
                'tags.id',
                $tag->id
            )->latest()->paginate(5),
        ]);
    }

    public function show(Post $post): view
    {

        return view('posts.show', compact('post'));
    }
}
