@extends('_layout/leftsidebar')

@section('content')
<h2>Hasil pencarian untuk '<strong>{{ $cari }}</strong>'</h2>
<hr>
@if (count($search_profil) or count($search_berita))
	@foreach ($search_profil as $profil)
		<h4> <a href="{{ url() }}/profil/{{$profil->slug}}">{{ $profil->judul }}</a></h4>
	@endforeach
	@foreach ($search_berita as $berita)
		<h4> <a href="{{ url() }}/berita/{{$berita->slug}}">{{ $berita->judul }}</a></h4>
	@endforeach
@else
	<h4>Tidak menemukan '<strong>{{ $cari }}</strong>'</h4>
@endif
@stop
