@extends('_layout/leftsidebar')

@section('content')
@if (Lang::getLocale()=='id')
<h2>Daftar Berita</h2>
@if ($semua_berita->count())
    @foreach($semua_berita as $berita)
    <h4><a href="{{URL::to('/')}}/berita/{{$berita->slug}}">{{ $berita->judul }}</a></a></h4>
    @endforeach
@else
    Tidak ada berita.
@endif
@elseif (Lang::getLocale()=='en')
<h2>All News</h2>
@if ($semua_berita->count())
    @foreach($semua_berita as $berita)
    <h4><a href="{{URL::to('/')}}/en/news/{{$berita->slug}}">{{ $berita->judul }}</a></a></h4>
    @endforeach
@else
    No News.
@endif
@endif
@stop

@section('script')
@parent
@stop

</body>
</html>

