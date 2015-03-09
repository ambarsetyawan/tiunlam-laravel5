@extends('_layout/base')

@section('css')
  @parent
  <link href="{{ asset('css/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl-carousel/owl.theme.css') }}" rel="stylesheet">
@stop

@section('mainslider')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="owl-slider" class="owl-carousel">

          <div class="item"><img src="{{ asset('img/fullimage1.jpg') }}" alt="The Last of us"><h4>Test Caption</h5><p>Deskripsi Caption</p></div>
          <div class="item"><img src="{{ asset('img/fullimage2.jpg') }}" alt="GTA V"><h4>Test Caption</h5><p>Deskripsi Caption</p></div>
          <div class="item"><img src="{{ asset('img/fullimage3.jpg') }}" alt="Mirror Edge"><h4>Test Caption</h5><p>Deskripsi Caption</p></div>

        </div>
      </div>
    </div>
  </div>
@stop

@section('content')
<div class="col-md-12">
<h2>Judul Konten</h2>
<p>Lorem ipsum dolor sit amet, magna minim oratio sea ei. Sumo ubique maiestatis sea ut, dicta consectetuer ius ad. Ad mea etiam paulo similique, legere admodum similique an mel. Sea ei ubique soluta, mei eu nibh definitiones, in quo hinc delenit. Pro ne solum malis tamquam.

Ad minim comprehensam sed. Ad sed verterem maiestatis. Dolore consulatu an nam, eam rebum convenire consequat an, qui ea regione perpetua. Eum cu ferri utinam virtute. Nam eu sale ocurreret principes, usu veritus epicurei contentiones te, veri mazim harum mel id. Has id harum simul, has vidit movet eu, pro eu nibh quando ridens. Ei per dico vidit debitis, an cum meliore mediocrem hendrerit, sit diceret mediocrem ea.

Quot movet integre eu vel, vis omnis utinam eu. Mel id illum tacimates. Mei graeci scripserit ea, est ex natum nostro menandri. Est ut doming labore mediocritatem. Vel in ferri labore, eius nostrud duo ea. Albucius lobortis at has.

Vis mundi rationibus conclusionemque id, ius simul corrumpit eu, ius an ridens suscipit suscipiantur. Sumo dissentiet ad nec, eius aeterno eruditi et cum, ei exerci tibique qui. Quo liber dolor menandri an, nonumy moderatius mediocritatem an est. Pro duis vocibus imperdiet te, libris consequat pro ut.

Eos quidam oportere at. Fastidii noluisse ad his, ut sed iudico fabellas, summo omittam assentior has cu. Alia neglegentur ea eos. His putent prompta laoreet ei.</p>
<p><a class="btn btn-default" href="#" role="button">Read more &raquo;</a></p>
</div>
@stop

@section('script')
  @parent
    <script src="{{ asset('css/owl-carousel/owl.carousel.js') }}"></script>
    <script>
    $(document).ready(function() {
      $("#owl-slider").owlCarousel({

      autoPlay   : true,
      navigation : false,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true

      // "singleItem:true" is a shortcut for:
      // items : 1,
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
    </script>
@stop
