@extends('_layout/admin')

@section('content')

<h2>{{ $profil->judul}}</h2>
<article>{!! ($profil->konten) !!}</article>


@stop
