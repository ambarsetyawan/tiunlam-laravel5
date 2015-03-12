<!-- Section MainMenu -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="collapse-menu">
      <ul class="nav navbar-nav">
      @if (Request::is('/')) <li class="active"> @else <li> @endif
      @if (Lang::getLocale()=='id')
      <a href="{{ route('homepage') }}"><i class="glyphicon glyphicon-home"></i> {{ trans('menu.home') }}<span class="sr-only">(current)</span></a></li>
      @else
      <a href="{{ url('/en') }}"><i class="glyphicon glyphicon-home"></i> {{ trans('menu.home') }}<span class="sr-only">(current)</span></a></li>
      @endif
      @if (Lang::getLocale()=='id')
      @if (Request::is('profil/*')) <li class="dropdown active"> @else <li class="dropdown"> @endif
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menu.profil') }}<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          @foreach($semua_profil as $profil)
          @if(Auth::guest())
          <li><a href="{{ url('/profil')}}/{{ $profil->slug }}">{{ $profil->judul }}</a></li>
          @else
          <li><a href="{{ url('/admin/home/profil')}}/{{ $profil->slug }}">{{ $profil->judul }}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
      @if (Request::is('berita') or Request::is('berita/*')) <li class="active"> @else <li> @endif
      <a href="{{ route('berita.index') }}">{{ trans('menu.berita') }}</a></li>
      @elseif (Lang::getLocale()=='en')
      <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ trans('menu.profil') }}<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          @foreach($all_about as $about)
          @if(Auth::guest())
          <li><a href="{{ url('/en/about')}}/{{ $about->slug }}">{{ $about->judul }}</a></li>
          @else
          <li><a href="{{ url('/en/admin/home/about')}}/{{ $about->slug }}">{{ $about->judul }}</a></li>
          @endif
          @endforeach
        </ul>
      </li>
      <li><a href="{{ route('berita.index_en') }}">{{ trans('menu.berita') }}</a></li>
      @endif
      <li><a href="#">{{ trans('menu.event') }}</a></li>
      @if (Request::is('surat')) <li class="active"> @else <li> @endif
      <a href="{{ url('pdf') }}">Surat</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if(Auth::guest())
      {!! Form::open(array('route'=>'search-home', 'class'=>'navbar-form', 'role'=>'search')) !!}
      @else
      {!! Form::open(array('route'=>'search-admin', 'class'=>'navbar-form', 'role'=>'search')) !!}
      @endif
      <div class="input-group">
      {!! Form::text('cari', null, array('class'=>'form-control')) !!}
        <div class="input-group-btn">
      {!! Form::button('Search',array('type' =>'submit', 'class'=>'btn btn-default')) !!}
        </div>
        </div>
        @if(Auth::guest())
        <a class="btn btn-success" href="{{ route('login') }}">Login</a>
        @else
        <a class="btn btn-danger" href="{{ route('dashboard') }}">{{ trans('menu.dashboard') }}</a>
        @endif
        @if (Lang::getLocale()=='id')
          @if (Auth::guest())
          <a href="{{ url('/en') }}"><img src="{{ asset('img/usa.png') }}"></a>
          @else
          <a href="{{ url('/en/admin/home') }}"><img src="{{ asset('img/usa.png') }}"></a>
          @endif
        @elseif (Lang::getLocale()=='en')
          @if (Auth::guest())
          <a href="{{ url('/') }}"><img src="{{ asset('img/indonesia.png') }}"></a>
          @else
          <a href="{{ url('/admin/home') }}"><img src="{{ asset('img/indonesia.png') }}"></a>
          @endif
        @endif
        {!! Form::close() !!}
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- End Section MainMenu -->

