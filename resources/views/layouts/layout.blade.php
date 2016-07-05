<!doctype html>
<html>
<head>
    @include('layouts.head')
    <title>@yield('title') - powered by 风之凌殇</title>
    @yield('head')
</head>
<body>
@include('layouts.navbar')
@yield('body')
@include('layouts.footer')
</body>
</html>