@extends('_layout/admin')

@section('css')
@parent
@include('includes.tinymce')
@stop

@section('content')

{!! Form::open(array('route'=>'store_profil', 'files'=>true)) !!}
    <div class="form-group">
        <h3>Judul profil</h3>
        {!! Form::text('judul', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <h3>Isi profil</h3>
        {!! Form::textarea('konten', null, ['class'=>'form-control']) !!}
    <hr>
    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

@stop

@section('script')
@parent
@stop
