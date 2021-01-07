@extends ('layout2')
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		@if(session('message'))<h1> {{session('message')}}</h1> @endif
		<div>
			<ul class="style1">
        @forelse ($articles as $article)
  				<li class="first">
  					<h3>{{ $article->title }}</h3>
  					<p><a href="{{ $article->path() }}"> {{$article->excerpt}} </a></p>
  				</li>
				@empty
					<p>No Articles Yet</p>
        @endforelse
			</ul>
		</div>
	</div>
</div>
@endsection
