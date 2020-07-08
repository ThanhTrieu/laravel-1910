@extends('test.test-layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>This is contact page</h1>
                <p>Name: {!! $myName !!}</p>
                <p>Age: {{$myAge}}</p>
                <p>Address: {{$myAdd}}</p>
                <p>Phone: {{$myPhone}}</p>
                <button class="btn btn-primary js-test">Click me</button>
            </div>
        </div>
    </div>
@endsection
@push('javascripts')
    {{-- day cac ma lenh hay file js sang trang test-layout.blade --}}
    <script type="text/javascript">
        $(function () {
            $('.js-test').on('click', function () {
                alert('Ban vua bam vao toi');
            });
        });
    </script>
@endpush
