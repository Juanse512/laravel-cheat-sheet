@extends('layout2')
@section ('content')
<div id="wrapper">
  <div id= "new_page" class = "container">
    <h1 class = "heading has-text-weight-bold is-size-4">Edit Article</h1>
    <form method = "POST" action="/articles/{{$article->id}}">
      @csrf
      @method('PUT')
      <input value="{{$article->title}}" type ="text" id="title" class = "input" name = "title"><br><br>
      <input value="{{$article->excerpt}}" id="excerpt" class = "textarea" name = "excerpt"><br>
      <input value="{{$article->body}}" id="body" class = "textarea" name = "body"><br>
      <button class = "button is-link" type = "submit">Sumbit</button>
    </form>
  </div>

</div>

@endsection
