<?php
namespace App\Http\Controllers;
use App\Models\Posts;
class PostsController
{
  public function show($post){
    $posts = [
        'first' => 'Hola',
        'second' => 'Chau'
      ];
      if(! array_key_exists($post, $posts)){
        abort(404,"Not Found");
      }
      return view('post', [
        'post' => $posts[$post]
      ]);
    // return "Hola";
  }
  public function showSQL($slug){
    // $post = \DB::table('posts')->where('slug', $slug)->first();
    $post = Posts::where('slug', $slug)->firstOrFail();
    // dd($post);
    return view('post', [
      'post' => $post
    ]);
  }
}
