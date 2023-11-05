<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $posts = Auth::user()->posts()->get();
      //dd($posts);
      //$posts = Post::where('user_id', Auth::user()->id)->get();

      return view('todo.index', compact('posts'));
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

      $data = $request->all();
      $data['user_id'] = auth()->id();
      //dd($data);
      Post::create($data);
      return to_route('post.index');
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
      return view('todo.edit', compact('post'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, Post $post)
   {
      $post->update($request->except('_token', '_method'));
      return to_route('post.index');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Post $post)
   {
      $post->delete();
      return to_route('post.index');
   }

   public function update_status(Request $request, $id)
   {
      $status = $request->status;
      $task_find = Post::where('id', $id)->where('user_id', Auth::user()->id)->first();
      if (isset($task_find)) {
         $task_find->update([
            'status' => $status
         ]);
      }

      return 'success';
   }
}
