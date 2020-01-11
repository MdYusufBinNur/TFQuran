<!doctype html>

<html class="no-js"  lang="en">

@include('front_end.include.head')

<body onload="fetchBookmarks()">


@include('front_end.include.header')

@yield('book')

@include('front_end.include.footer')

@include('front_end.include.fscript')

</body>


</html>
