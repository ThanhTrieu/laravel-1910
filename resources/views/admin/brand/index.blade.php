@extends('admin.admin-layout')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List brands</h1>
            <a href="{{route('admin.add.brand')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add brand</a>
        </div>
        @if(!empty($message))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div class="row">

        </div>
    </div>
@endsection
