<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Image;
use Faker\Core\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::search()->with(['category', 'image'])->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $posts = $request->all();
        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $url = time() . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/images'), $url);
        }
        Post::create($posts)->image()->save(new Image(['url' => $url]));
        return to_route('posts.index')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('image')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('image')->findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->safe()->only(['title', 'body', 'category_id']);
        if ($file = $request->file('url')) {
           /*  $path =storage_path('app/public/images'.$post->image->url); */
            unlink(storage_path('app/public/images/') . $post->image->url);
            $file = $request->file('url');
            $url = time() . '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/images'), $url);
            $post->load('image');
            $post->image()->update(['url' => $url]);
        }
        $post->update($data);
        return to_route('posts.index')->with('success', 'Post Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->image()->delete();
        $post->delete();
        return to_route('posts.index')->with('success', 'Post Deleted Successfully');
    }
}
