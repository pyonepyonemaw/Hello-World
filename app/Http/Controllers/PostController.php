<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('index',['posts'=>$posts]);
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'des'=>'required'
        ]);
        Post::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('des')
        ]);
        return redirect()->back()->with('status','Post created successfully!');
    }
    public function show($id){
        $post = Post::find($id);
        return view('edit',['post'=>$post]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'des'=>'required'
        ]);
        Post::find($id)->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('des')
        ]);
        return redirect("posts")->with("status","Post updated successfully!");
    }
    public function destroy($id){
        Post::destroy($id);
        return redirect()->back()->with("status","Post Deleted successfully!");
    }
}
