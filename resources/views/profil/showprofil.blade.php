@extends('_layout/leftsidebar')

@section('content')

<h2>{{ $profil->judul }}</h2>
<article>{!! ($profil->konten) !!}</article>

@stop
