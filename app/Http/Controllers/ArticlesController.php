<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Article;
use App\Models\Tag;
use App\Mail\PostConfirm;
class ArticlesController extends Controller
{
  public function index(){
    if(request('tag')){
      $tag = request('tag');
      $article = Tag::where('name', $tag)->firstOrFail()->articles;
    }else{
      $article = Article::latest()->get();
    }
    return view('article.index', [
      'articles' => $article
    ]);
  }
    public function show(Article $article){
      return view('article.show', [
        'article' => $article,
        'user' => $article->user
      ]);
    }
    public function create(){
      $tags = Tag::all();
      return view('article.create', [
        'tags' => $tags
      ]);
    }
    public function store(){
      // $validatedAtributes = request()->validate([
      //   "title" => ['required', 'min:3', 'max:255'],
      //   "excerpt" => 'required',
      //   "body" => 'required'
      // ]);
      // Article::create($this->validateArticle());
      $this->validateArticle();
      $article = new Article(request(['title', 'excerpt', 'body']));
      $article->user_id = auth()->user()->id;
      $article->save();
      Mail::to(auth()->user()->email)
            ->send(new PostConfirm(auth()->user()->name));
      // dd(request()->all());
      // $article = new Article;
      // $article->title = request('title');
      // $article->excerpt = request('excerpt');
      // $article->body = request('body');
      $article->tags()->attach(request('tags'));
      return redirect(route('articles.index'))->with('message', 'Post Created and Email Sent');
    }
    public function edit(Article $article){
      return view('article.edit', [
        'article' => $article
      ]);
    }
    public function update(Article $article){
      // $validatedAtributes = request()->validate([
      //   "title" => ['required', 'min:3', 'max:255'],
      //   "excerpt" => 'required',
      //   "body" => 'required'
      // ]);
      $article->update($this->validateArticle());
      // $article->title = request('title');
      // $article->excerpt = request('excerpt');
      // $article->body = request('body');
      // $article->save();
      return redirect(route('articles.index'));
    }
    public function destroy(){}
    protected function validateArticle(){
        return request()->validate([
        "title" => ['required', 'min:3', 'max:255'],
        "excerpt" => 'required',
        "body" => 'required',
        "tags" => 'exists:tags,id'

      ]);
    }
}
