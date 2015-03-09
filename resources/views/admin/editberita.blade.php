@extends('_layout/admin')

@section('css')
@parent
@include('includes.tinymce')
@stop

@section('content')
{!! Form::model($berita, array('method' => 'PATCH', 'files'=>'true','route'=>array('update_berita', $berita->slug))) !!}

    <div class="form-group">
        <h3 style="margin-top:0px">Judul Berita</h3>
        {!! Form::text('judul', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <h3>Isi Berita</h3>
        {!! Form::textarea('konten', null, ['class'=>'form-control']) !!}
    </div>
        <label>{!! Form::checkbox('tampilkan', 1, false, ['id'=>'tampilkan', 'onchange'=>'tampil()']) !!} Tampilkan di slider halaman depan?</label>
    <hr>
    <div id="pilihgambar" class="form-group" style="display:none">
         <div class="gambar" style="float: left; display: inline-block; margin-right:50px">
         @if ($berita->gambar)
         <p>Gambar saat ini: </p>
         @else
         <p>Tidak ada gambar.</p>
         @endif
         <a href="{{ url() }}/{{ $berita->gambar }}"><img src="{{ url() }}/{{ $berita->gambar }}" style="width:150px; height:125px"></a>
         </div>
         <div style="display: inline-block">
         {!! Form::file('gambar', ['id'=>'preview']) !!}
         @if($berita->gambar)
         <img id="img" src="" alt="Ganti gambar?" style="display: inline-block; width:150px; height:125px; margin-top:6px;" />
         @else
         <img id="img" src="" alt="Upload gambar?" style="display: inline-block; width:150px; height:125px; margin-top:6px;" />
         @endif
         <p>Preview:</p>
         <p>Gambar yang diupload otomatis di resize sesuai ukuran slider</p>
        </div>
    </div>
    <label>{!! Form::checkbox('hapus_gambar', 'ya', false) !!} Hapus gambar?</label>
    <hr>
    <div class="form-group" style="clear:both">
        {!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
    </div>
{!! Form::close() !!}


@stop
'input[type="checkbox"]'
@section('script')
@parent
<script type="text/javascript">
$(document).ready(function(){
    $('input[id="tampilkan"]').click(function(){
        if($(this).attr("value")=="1"){
            $("#pilihgambar").toggle();
        }
});
})
</script>
<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview").change(function(){
        readURL(this);
    });
</script>
@stop



