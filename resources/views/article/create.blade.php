@extends('layout2')
@section ('content')
<div id="wrapper">
  <div id= "new_page" class = "container">
    <h1 class = "heading has-text-weight-bold is-size-4">New Article</h1>
    <form method = "POST" action="/articles">
      @csrf
      <input placeholder="Title" value = "{{old('title')}}" type ="text" id="title" class = "input @error('title') is-danger @enderror" name = "title"><br><br>
      @error('title')
        <p class = "helper is-danger"> {{$errors->first('title')}} </p>
      @enderror
      <input placeholder="Excerpt" id="excerpt" value = "{{old('excerpt')}}" class = "textarea" name = "excerpt"><br>
      @if ($errors->has('excerpt'))
        <p class = "helper is-danger"> {{$errors->first('excerpt')}} </p>
      @endif
      <input placeholder="Body" value = "{{old('body')}}" id="body" class = "textarea" name = "body"><br>
      @error('body')
        <p class = "helper is-danger"> {{$errors->first('body')}} </p>
      @enderror
      <select name = "tags[]" multiple>
        @foreach($tags as $tag)
          <option value="{{$tag->id}}" >{{$tag->name}}</option>
        @endforeach
      </select>
      @error('tags')
        <p class = "helper is-danger"> {{$message}} </p>
      @enderror
      <button class = "button is-link" type = "submit">Sumbit</button>
    </form>
  </div>
</div>

@endsection
