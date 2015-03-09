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

@yield('mainslider', "tidak ada slider")
<!-- Section MainSlider -->

<!-- End Section MainSlider -->
<!-- start container -->
<div class="container">

<div id="mainbody"> <!-- konten -->

    <div class="row">
    @yield('content', "tidak ada konten")
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
