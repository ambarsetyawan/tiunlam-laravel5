@extends('_layout/admin')

@section('css')
@parent
@include('includes.tinymce')
@stop

@section('content')
{!! Form::model($profil, array('method' => 'PATCH', 'files'=>'true','route'=>array('update_profil', $profil->slug))) !!}

    <div class="form-group">
    <h3>Judul Profil</h3>
        {!! Form::text('judul', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
    <h3>Isi Profil</h3>
        {!! Form::textarea('konten', null, ['class'=>'form-control']) !!}
    </div>
    <hr>
    <div class="form-group" style="clear:both">
        {!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
    </div>

{!! Form::close() !!}

@stop
@section('script')
@parent
@stop



