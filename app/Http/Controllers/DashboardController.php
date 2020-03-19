<?php

namespace App\Http\Controllers;


use App\Post;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $posts = Post::paginate(20);

        return view('admin.index', compact('posts'));

    }

    public function create(){

        return view('admin.create');

    }

    public function store(Request $request){

        $this->validate($request, [

            'title'=>'required|min:3',
            'content'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png'

        ]);

        if($request->hasFile('image')){

            $file = $request->file('image');

            $path = $file->store('uploads', 'public');

            Post::create([

                'title'=> $title = $request->get('title'), 
                'slug'=>Str::slug($title),
                'content'=>$request->get('content'),
                'image'=>$path

            ]);
        }

        return redirect('/dashboard')->with('message', 'Post created successfully.');

    }

    public function destroy(Request $request){

        $id = $request->get('id');
        
        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('message', 'Post deleted successfully');

    }

    public function edit($id){

        $post = Post::find($id);

        return view('admin.edit', compact('post'));

    }
}
