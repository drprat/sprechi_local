@extends('layouts.master')

@section('title') Login @stop

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{!! $error !!}</div>
        @endforeach
    @endif
	
	
	 @foreach ($users as $user)
<h1>{!! $user->getFullName() !!}</h1>
  @endforeach

    <h1><i class='fa fa-lock'></i> Login</h1>

    {!! Form::open(['role' => 'form']) !!}

    <div class='form-group'>
        {!! Form::label('username', 'username') !!}
        {!! Form::text('username', null, ['placeholder' => 'username', 'class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
        {!! Form::label('password', 'password') !!}
        {!! Form::password('password', ['placeholder' => 'password', 'class' => 'form-control']) !!}
    </div>

    <div class='form-group'>
        {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>

@stop