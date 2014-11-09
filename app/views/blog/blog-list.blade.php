@section('content')
	<h3>Listing</h3>
	<br>
	@foreach($blogs as $blog)
		<h1>{{ link_to('blog/view/'.$blog->id,$blog->title) }}</h1>
		<p>{{ $blog->summary }}</p>
	@endforeach
@show