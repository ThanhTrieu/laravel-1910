@extends('admin.admin-layout')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add brand</h1>
            <a href="{{route('admin.brand')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> List brands</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!empty($errLogo))
            <div class="alert alert-danger">
                <p>{{$errLogo}}</p>
            </div>
        @endif

        <form class="border p-3 my-3" action="{{route('admin.handle.add.brand')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="nameBrand">Ten thuong hieu</label>
                        <input type="text" id="nameBrand" name="nameBrand" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="logoBrand">Logo thuong hieu</label>
                        <input type="file" id="logoBrand" name="logoBrand" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="descriptionBrand">Thong tin thuong hieu</label>
                        <textarea class="form-control" name="descriptionBrand" id="descriptionBrand" rows="8"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
