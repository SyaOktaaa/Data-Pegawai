<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class TabelUserController extends Controller
{
        /**
     * index
     *
     * @return View
     */

    public function tabel(): View
    {
        $posts = User::latest()->paginate(5);
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();

        //render view with posts
        return view('admin.posts.tabel.dashboard', compact('posts', 'maleCount', 'femaleCount'));
    }

    public function createuser(): View
    {
        $maleCount = Post::where('jenis_kelamin', 'laki-laki')->count();
        $femaleCount = Post::where('jenis_kelamin', 'cewe')->count();
        return view('admin.posts.tabel.createuser', compact('maleCount', 'femaleCount'));
    }

    public function storeuser(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertypee' => $request->usertype,
        ]);

        event(new Registered($user));


        return redirect('admin/posts/tabel')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.posts.tabel.edituser', compact('user'));
    }

    // Method untuk meng-update data user
    public function updateuser(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', Rules\Password::defaults()],
            'usertype' => ['required', 'string'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('admin/posts/tabel')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroyuser($id): RedirectResponse
    {
        //get post by ID
        $post = User::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect('admin/posts/tabel')->with(['success' => 'Data Berhasil Dihapus!']);
    }
  
   public function show(string $id): View
   {
       //get post by ID
       $post = Post::findOrFail($id);

       //render view with post
       return view('admin.posts.show', compact('post'));
   }

}