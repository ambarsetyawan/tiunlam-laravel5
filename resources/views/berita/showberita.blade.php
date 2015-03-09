@extends('_layout/leftsidebar')

@section('content')

<h2>{{ $berita->judul }}</h2>
<article>{!! ($berita->konten) !!}</article>
@if ($berita->gambar)
<img class="img-responsive" src="{{ url() }}/{{ $berita->gambar }}">
@endif

@stop
