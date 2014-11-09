@section('content')
	{{ Form::open(array('url' => 'blog/update/'.$blog->id)) }}
		<h3>{{ Form::label('main-title','Edit Blog') }}</h3>
		<br>
		{{ Form::label('lblTitle','Title') }}
		<br>
		{{ Form::text('title', $blog->title) }}
		<br>
		{{ Form::label('lblTitleBody','Body') }}
		<br>
		{{ Form::textarea('body', $blog->body ) }}
		<br>
		<br>		
		{{Form::submit('Update')}}	
	{{ Form::close() }}
@show