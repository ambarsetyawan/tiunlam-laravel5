<!DOCTYPE html>
<html lang="en">

<head>

@include('includes.head')

@yield('title')
<title>Selamat Datang di Website TI UNLAM</title>
</head>

<body>

<header>

@include('includes.mainmenu')

</header>

<hr>

<!-- start container -->
<div class="container">

<div id="mainbody"> <!-- konten -->

  <div class="row">

    <div class="col-md-3">
      @include('includes.leftsidebar')
    </div>
    <div class="col-md-9">
      @yield('content', 'tidak ada konten')
    </div>

  </div>

</div> <!-- end konten -->

<hr>

<!-- start footer -->
<footer>

@include('includes.footer')

</footer>
<!-- end footer -->

</div>
<!-- end container -->

@section('script')
@include('includes.script')
@show

</body>

</html>
