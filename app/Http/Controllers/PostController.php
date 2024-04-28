<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts')); // compact('posts') is equal to ['posts' => $posts]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
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

        // Remove the 'public/' from the path
        $imagePath = str_replace('public/', '', $imagePath);

        // Salva os dados do post no banco de dados
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}