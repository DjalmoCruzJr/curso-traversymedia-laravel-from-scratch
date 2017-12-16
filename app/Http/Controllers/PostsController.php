<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    private $_paginationSize = 3;
    private $_storePath = 'public/images';
    private $_fileNameToStore = 'noimage.jpeg';

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index() {
        //$posts = Post::where('title', 'LIKE', '%post%')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate($this->_paginationSize);
        return view('posts.index')->with('posts', $posts);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('thumbnail')) {
            $fileNameWithExt = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $this->_fileNameToStore = $fileName . '_' . time() . '.'. $extension;
            $path = $request->file('thumbnail')->storeAs($this->_storePath, $this->_fileNameToStore);
        }  else {
            $this->_fileNameToStore = 'noimage.jpeg';
        }

        // Save Post
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->thumbnail = $this->_fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Post creted successfully');
    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function edit($id) {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id) {
            $error = 'Sorry '.auth()->user()->name.'! Unauthorized Action.';
            return redirect('/posts')->with('errors', [$error]);
        }

        return view('posts.edit')->with('post', $post);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required' 
        ]);

        // Handle File Upload
        if($request->hasFile('thumbnail')) {
            $fileNameWithExt = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $this->_fileNameToStore = $fileName . '_' . time() . '.'. $extension;
            $path = $request->file('thumbnail')->storeAs($this->_storePath, $this->_fileNameToStore);
        } else {
            $this->_fileNameToStore = 'noimage.jpeg';
        }

        // Save Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body= $request->input('body');
        if($request->hasFile('thumbnail')) {
            $post->thumbnail = $this->_fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success', 'Post updated successfully');
    }

    public function destroy($id) {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id) {
            $error = 'Sorry '.auth()->user()->name.'! Unauthorized Action.';
            return redirect('/posts')->with('errors', [$error]);
        }

        // Delete Post Image
        if($post->thumbnail !== 'noimage.jpeg') {
            Storage::delete($this->_storePath .'/'. $post->thumbnail);
        }

        $message = "<strong>".$post->title . "</strong>". ' deleted successfully';
        $post->delete();
        return redirect('/posts')->with('success', $message);
    }
}
