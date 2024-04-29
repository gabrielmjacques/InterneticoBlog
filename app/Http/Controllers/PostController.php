<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recentlyPosts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $posts = Post::orderBy('created_at', 'asc')->paginate(5);

        return view('posts.index', compact('recentlyPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.editor');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'O campo título é obrigatório.',
                'content.required' => 'O campo conteúdo é obrigatório.',
                'description.required' => 'O campo descrição é obrigatório.',
                'image.required' => 'O campo imagem é obrigatório.',
            ]
        );

        $file = $request->file('image');
        // make unique name
        $name = time() . '_' . $file->getClientOriginalName();

        // Saving the image in the storage
        $imagePath = $file->storeAs('public/image', $name);

        // Remove the public/ from the path
        $imagePath = str_replace('public/', '', $imagePath);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->image = $imagePath;
        $post->user_id = auth()->id();

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post criado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $user = $post->user;

        return view('posts.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.editor', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'description' => 'required',
            ],
            [
                'title.required' => 'O campo título é obrigatório.',
                'content.required' => 'O campo conteúdo é obrigatório.',
                'description.required' => 'O campo descrição é obrigatório.',
            ]
        );

        $file = $request->file('image');

        if($file){
        $name = time() . '_' . $file->getClientOriginalName();

        Storage::delete('public/' . $post->image);
        
        $imagePath = $file->storeAs('public/image', $name);
        $imagePath = str_replace('public/', '', $imagePath);
        $post->image = $imagePath;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->user_id = auth()->id();

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete('public/' . $post->image);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deletado com sucesso!');
    }
}