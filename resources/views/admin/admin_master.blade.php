<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('admin.includes.head')
    @yield('head')
<body class="hold-transition sidebar-mini">

<div class="wrapper">


    @guest
        @include('auth.login')

        @else

        @include('admin.includes.header')

        @include('admin.includes.sidebar')



        @yield('body')

        @include('admin.includes.right_sidebar')

        @include('admin.includes.footer')

    @endguest


    @include('admin.includes.script')

</div>

</body>
</html>
