@extends('_layout/admin')

@section('css')
@parent
@stop

@section('content')

<h3>Daftarkan User Baru</h3>
{!! Form::open(array('route'=>'register')) !!}
	<div class="form-group @if ($errors->has('nama')) has-error @endif">
		{!! Form::label('name', 'Nama: ',[]) !!} <br>
		{!! Form::text('nama', null, ['class'=>'form-control', 'style'=>'width:300px;display: inline-block']) !!}
		@if ($errors->first('nama'))
		<label class="alert alert-danger" style="display: inline-block">{{ $errors->first('nama') }} </label>
		@endif
	</div>
	<div class="form-group @if ($errors->has('username')) has-error @endif">
		{!! Form::label('username', 'Username: ',[]) !!} <br>
		{!! Form::text('username', null, ['class'=>'form-control', 'style'=>'width:300px;display: inline-block']) !!}
		@if ($errors->has('username'))
		<label class="alert alert-danger" style="display: inline-block">{{ $errors->first('username') }} </label>
		@endif
		</div>
	<div class="form-group @if ($errors->has('email')) has-error @endif">
		{!! Form::label('email', 'Email: ',[]) !!} <br>
		{!! Form::text('email', Input::old('email'), ['class'=>'form-control', 'style'=>'width:300px;display: inline-block']) !!}
		@if ($errors->has('email'))
		<label class="alert alert-danger" style="display: inline-block">{{ $errors->first('email') }} </label>
		@endif
	</div>
	<div class="form-group @if ($errors->has('password')) has-error @endif">
		{!! Form::label('password', 'Password: ',[]) !!} <br>
		{!! Form::password('password', ['class'=>'form-control','style'=>'width:300px;display: inline-block']) !!}
		@if ($errors->has('password'))
		<label class="alert alert-danger" style="display: inline-block">{{ $errors->first('password') }} </label>
		@endif
	</div>
	<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
		{!! Form::label('konfirmasi_password', 'Konfirmasi Password: ',[]) !!} <br>
		{!! Form::password('password_confirmation', ['class'=>'form-control','style'=>'width:300px;display: inline-block']) !!}
		@if ($errors->first('password_confirmation'))
		<label class="alert alert-danger" style="display: inline-block">{{ $errors->first('password_confirmation') }} </label>
		@endif
	</div>
	<div class="form-group">
		{!! Form::submit('Register', ['class'=>'btn btn-primary']) !!}
		{!! Form::submit('Cancel', ['class'=>'btn btn-danger']) !!}
	</div>

{!! Form::close() !!}
@stop
