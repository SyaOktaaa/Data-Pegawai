<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import Model Post

use App\Models\post;

use Illuminate\Validation;
//return type View

use Illuminate\View\View;

use App\Http\Controllers\Controller;

//return type redirectResponse

use Illuminate\Http\RedirectResponse;

//import Facade "Storage"

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * index
     *
     * @return View
     */

     public function index(): View
     {
        //get posts

        $posts = Post::latest()->paginate(5);

        //render view with posts

        return view('admin/posts.dashboard', compact('posts'));
     }

         /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.posts.create');
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $validatedData = $request->validate([
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:3',
            'alamat'   => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin' => 'required',
            'jabatan'  => 'required',
            'tanggal_masuk'=> 'required',
            'job'=> 'required'

        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        Post::create([
            'image'     => $image->hashName(),
            'nama'     => $request->nama,
            'alamat'   => $request->alamat,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'jabatan'       => $request->jabatan,
            'tanggal_masuk'     => $request->tanggal_masuk,
            'job'       => $request->job

        ]);

        //redirect to index
        return redirect('admin/posts/pegawai')->with(['success' => 'Data Berhasil Disimpan!']);
    }

        /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('admin.posts.show', compact('post'));
    }

        /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //render view with post
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $validatedData = $request->validate([
            'image'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama'     => 'required|min:3',
            'alamat'   => 'required|min:5',
            'tempat_lahir'  => 'required|min:3',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin' => 'required',
            'jabatan'  => 'required|min:3',
            'tanggal_masuk'=> 'required',
            'job'=> 'required|min:5'

        ]);

        //get post by ID
        $post = Post::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'nama'     => $request->nama,
                'alamat'   => $request->alamat,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'jabatan'       => $request->jabatan,
                'tanggal_masuk'     => $request->tanggal_masuk,
                'job'       => $request->job

            ]);

        } else {

            //update post without image
            $post->update([
                'nama'     => $request->nama,
                'alamat'   => $request->alamat,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'jabatan'       => $request->jabatan,
                'tanggal_masuk'     => $request->tanggal_masuk,
                'job'       => $request->job

            ]);
        }

        //redirect to index
        return redirect('admin/posts/pegawai')->with(['success' => 'Data Berhasil Diubah!']);
    }

        /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Post::findOrFail($id);

        //delete image
        Storage::delete('public/posts/'. $post->image);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('admin/posts/pegawai')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function pegawai(): View
    {
        $posts = Post::latest()->paginate(5);

        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'Cewe')->count();

        //render view with posts
        return view('admin/posts/pegawai.dashboard', compact('posts', 'maleCount', 'femaleCount'));
    }

}
