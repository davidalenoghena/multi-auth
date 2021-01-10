<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $post = DB::table('posts')->orderBy('created_at', 'desc')->get();
        return view('admin.post.post', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'author' => 'required',
            'title' => 'required',
            'preview' => 'required',
            'read_more' => 'required',
        ]);
                
        $post = new Post();
        $post->author = $request->author;
        $post->title = $request->title;
        $post->preview = $request->preview;
        $post->read_more = $request->read_more;
        $post->save(); 
        $request->session()->flash('success', 'Post added successfully');
        return redirect()->route('admin.post');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $activity
     * @return \Illuminate\Http\Response
     */
    public function show( $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'author' => 'required',
            'title' => 'required',
            'preview' => 'required',
            'read_more' => 'required',
            ]);
        $data = array(
            'author' => $request->input('author'),
            'title' => $request->input('title'),
            'preview' => $request->input('preview'),
            'read_more' => $request->input('read_more'),
        );       
        Post::where('id', $id)->update($data);
        return redirect('/admin/post')->with('success', 'Post updated successfully'); 

        $team = Post::find($id);
        $this->validate($request, [        
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

