@extends('_layout/admin')

@section('css')
@parent
@include('includes.tinymce')
@stop

@section('content')
{!! Form::open(array('route'=>'store_berita_en', 'files'=>true)) !!}
    <div class="form-group">
        <h3>Judul Berita</h3>
        {!! Form::text('judul', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        <h3>Isi Berita</h3>
        {!! Form::textarea('konten', null, ['class'=>'form-control']) !!}
    </div>
    <label>{!! Form::checkbox('tampilkan', 1, false, ['id'=>'tampilkan', 'onchange'=>'tampil()']) !!} Tampilkan di slider halaman depan?</label>
    <hr>
    <div id="pilihgambar" class="form-group" style="display:none">
       {!! Form::file('gambar', ['id'=>'preview']) !!}
        <img id="img" src="" alt="Tidak ada gambar" style="display: inline-block; width:150px; height:125px;" />
        <p>Preview</p>
        <p>Gambar yang diupload otomatis di resize sesuai ukuran slider</p>
    <hr>
    </div>
    <div class="form-group">
    {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>
</div>

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

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
