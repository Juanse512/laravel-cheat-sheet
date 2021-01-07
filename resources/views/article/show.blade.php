@extends ('layout2')
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{$article->title}}</h2>
				@foreach ($article->tags as $tag)
					<a href="/articles?tag={{ $tag->name }}">{{$tag->name}}</a>
				@endforeach
			<h1>Created by {{$user->name}}</h1>	
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
		   {{$article->body}}
		</div>
	</div>
</div>
@endsection
