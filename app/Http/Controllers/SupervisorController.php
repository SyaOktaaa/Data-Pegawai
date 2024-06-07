<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use App\Models\User;


class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('supervisor.dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        //render view with post
        return view('supervisor.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function pegawai(): View
    {
        $posts = Post::latest()->paginate(5);

        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();

        //render view with posts
        return view('supervisor/pegawai.dashboard', compact('posts', 'maleCount', 'femaleCount'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('supervisor.tabel.edit', compact('user'));
    }
}
