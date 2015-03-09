@extends('_layout/admin')

@section('content')
<div id="lang-tab" style="margin-top:20px">
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a data-toggle="tab" href="#indonesia">Indonesia</a></li>
  <li role="presentation"><a data-toggle="tab" href="#english">English</a></li>
</ul>
</div>
<div class="tab-content">
<!--tab edit bahasa indonesia -->
<div id="indonesia" class="tab-pane fade in active">
<h3>Daftar Berita</h3>
@if ($semua_berita->count())
    <table class="table table-bordered table-hover table-condensed">
        <thead>
        <tr>
        <th class="info" style="text-align:center">Judul Berita</th>
        <th class="info" colspan="2" style="text-align:center">Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($semua_berita as $berita)
            <tr>
          <td style="vertical-align:middle"><a href="{{ url('admin/berita')}}/{{ $berita->slug }}"> {{ $berita->judul }}</h4></td>
          <td style="text-align:center;vertical-align:middle"><a class="btn btn-info" href="{{ route('edit_berita',$berita->slug) }}">Edit</a></td>
          <td style="text-align:center; width:26%">
            {!! Form::open(array('style'=>'margin:0 auto', 'method'=> 'DELETE', 'route'=> array('delete_berita', $berita->slug))) !!}
            {!! Form::submit('Delete', array('id'=>'confirm', 'class'=> 'btn btn-danger', 'data-toggle'=>'confirmation', 'data-popout'=>'true')) !!}
            {!! Form::close() !!}
          </td>
          </tr>
            @endforeach
        </tbody>
    </table>
@else
    Tidak ada berita.
@endif
<a class="btn btn-success" href="{{ route('tambah_berita') }}">Tambah</a>
</div>
<div id="english" class="tab-pane fade">
<h3>All News</h3>
@if ($all_news->count())
    <table class="table table-bordered table-hover table-condensed">
        <thead>
        <tr>
        <th class="info" style="text-align:center">Judul Berita</th>
        <th class="info" colspan="2" style="text-align:center">Action</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($all_news as $berita)
            <tr>
          <td style="vertical-align:middle"><a href="{{ url('/admin/en/news/') }}/{{ $berita->slug }}"> {{ $berita->judul }}</a></td>
          <td style="text-align:center;vertical-align:middle"><a class="btn btn-info" href="{{ route('edit_berita_en',$berita->slug) }}">Edit</a></td>
          <td style="text-align:center; width:26%">
            {!! Form::open(array('style'=>'margin:0 auto', 'method'=> 'DELETE', 'route'=> array('delete_berita_en', $berita->slug))) !!}
            {!! Form::submit('Delete', array('id'=>'confirm', 'class'=> 'btn btn-danger', 'data-toggle'=>'confirmation', 'data-popout'=>'true')) !!}
            {!! Form::close() !!}
          </td>
          </tr>
            @endforeach
        </tbody>
    </table>
@else
    No News.
@endif
<a class="btn btn-success" href="{{ route('tambah_berita_en') }}">Tambah</a>
</div>
</div>

@stop

@section('script')
@parent
<script type="text/javascript" src="{{{ asset('js/bootstrap-confirmation.min.js') }}}"></script>
<script type="text/javascript">
$('[data-toggle="confirmation"]').confirmation('hide');
</script>
@stop

</body>
</html>

