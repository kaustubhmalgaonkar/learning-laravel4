{{ Form::open(array('url' => 'user/auth')) }}
    
    {{ Form::text('username'); }}
    {{ Form::password('password'); }}
    {{Form::submit('Submit');}}
    
{{ Form::close() }}