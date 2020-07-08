@extends('test.test-layout')

@push('stylesheets')
    <style type="text/css">
        h1{
            color: blueviolet !important;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row my-3" style="min-height: 650px;">
            <div class="col col-12">
                <h1>Thong tin dich benh covid-19</h1>
                <button class="btn btn-primary js-test">Click me</button>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Quoc gia</th>
                            <th>Nhiem benh</th>
                            <th>Tu vong</th>
                            <th>Khoi benh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // khai bao bien
                            $tongNhiem = 0;
                            $tongTV = 0;
                            $tongKhoi = 0;
                        @endphp

                        @foreach($corona as $key => $item)
                            @php
                                $tongNhiem += $item['nhiem_benh'];
                                $tongTV += $item['tu_vong'];
                                $tongKhoi += $item['khoi_benh'];
                            @endphp
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td> {{ $item['country'] }}</td>
                                <td> {{ number_format($item['nhiem_benh']) }}</td>
                                <td> {{ number_format($item['tu_vong']) }}</td>
                                <td> {{ number_format($item['khoi_benh']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-dark text-white">
                            <td colspan="2">Tong</td>
                            <td>{{ number_format($tongNhiem) }}</td>
                            <td>{{ number_format($tongTV) }}</td>
                            <td>{{ number_format($tongKhoi) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('javascripts')
    <script src="{{asset('test/js/home.js')}}" type="text/javascript"></script>
@endpush
