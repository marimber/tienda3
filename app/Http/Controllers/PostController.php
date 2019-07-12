<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($id)
    {
        return view('posts.post', ['post' => Post::find($id)]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required:max:40',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imgName = basename($request->file('img')->store('posts/' . Auth::id(), 'public'));
        $title = $request->get('title');
        $user_id = Auth::id();

        $post = new Post();
        $post->title = $title;
        $post->img = $imgName;
        $post->user_id = $user_id;

        $request->img->move(public_path('images'), $imgName);

        $post->save();

        return redirect()->route('posts', ['id' => $post->id]);
    }

    public function myposts()
    {
        return redirect(action('UserController@posts'));
    }

   

    public function destroy($id) 
    {
      Post::destroy($id);
      return redirect(action('UserController@posts'));
    }

    public function showuser()
    {
        return view('user');
    }
}
