@section('content')
	{{ link_to('blog/edit/'.$blogData->id , 'Edit') }}
	<h1>{{ $blogData->title }}</h1> 
	<p>Posted By {{ $blogData->user_data->username }} on {{ $blogData->user_data->created_at }}</p><br>
	<p>{{ $blogData->body }}</p>
@show