<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['categories', 'tags'])->paginate(10);
        $top3Posta = Post::with(['categories', 'tags'])->where('is_top', 1)->limit(3)->get();
        $categories = Category::withCount('posts')->get();
        $postsByCategory = [];

        foreach ($categories as $category) {
            $postsByCategory[$category->name] = $category->posts;
        }
        dd($postsByCategory, $categories);
        return view('main.home', compact('postsByCategory', 'categories', 'posts'));
    }

    // Display a single post
    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->with(['categories', 'tags', 'comments'])->firstOrFail();
        $relatedPosts = Post::whereHas('categories', function ($query) use ($post) {
            $query->whereIn('id', $post->categories->pluck('id'));
        })->where('id', '!=', $post->id)->limit(5)->get();

        return view('main.post', compact('post', 'relatedPosts'));
    }

    // Display posts by tag
    public function showByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(10);

        return view('main.tags.show', compact('tag', 'posts'));
    }

    // Display posts by category
    public function showByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(10);

        return view('main.categories.show', compact('category', 'posts'));
    }
}
