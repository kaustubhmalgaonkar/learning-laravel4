@section('content')
	{{ Form::open(array('url' => 'blog/add')) }}
		<h3>{{ Form::label('main-title','Add Blog') }}</h3>
		<br>
		{{ Form::label('lblTitle','Title') }}
		<br>
		{{ Form::text('title', null, array('placeholder' => 'Title')) }}
		<br>
		{{ Form::label('lblTitleBody','Body') }}
		<br>
		{{ Form::textarea('body', null, array('placeholder' => 'Body')) }}
		<br>
		<br>		
		{{Form::submit('Submit')}}
	{{ Form::close() }}
@show