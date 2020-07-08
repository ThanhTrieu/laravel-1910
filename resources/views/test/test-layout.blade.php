<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Virus corona</title>
    {{--  nhung bootstrap css  --}}
    <link href="{{asset('test/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    {{--noi de nhung file css cua cac trang vao day--}}
    @stack('stylesheets')
</head>
<body>
    {{-- nhung template header --}}
    @include('test.partials.header')

<main>
    {{-- nap noi dung tu template file con sang --}}
    @yield('content')
</main>

{{--nhung template footer--}}
@include('test.partials.footer')

{{--nhung jquery--}}
<script type="text/javascript" src="{{asset('test/js/jquery-3.5.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('test/js/bootstrap.min.js')}}"></script>

{{--noi de nhung file js cua cac trang vao day--}}
@stack('javascripts')
</body>
</html>

