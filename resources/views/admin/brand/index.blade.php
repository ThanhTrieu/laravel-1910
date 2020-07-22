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
        <div class="row my-3">
            <div class="col">
                <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search border p-3">
                    <div class="input-group">
                        <select class="form-control mr-3 js-status-brand">
                            <option value="1" {{$status == 1 ? 'selected' : ''}}> Active</option>
                            <option value="0" {{$status == 0 ? 'selected' : ''}}> Deactive</option>
                        </select>
                        <input type="text" class="form-control bg-light border small js-keyword-brand" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{$keyword}}">
                        <div class="input-group-append">
                            <button class="btn btn-primary js-search-brand" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="20%">Thuong hieu</th>
                            <th>Logo Thuong hieu</th>
                            <th>Trang thai</th>
                            <th colspan="2" width="10%">Thao tac</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listBrands as $key => $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img class="img-fluid img-thumbnail w-25" src="{{asset('uploads/images/brands')}}/{{$item->logo}}">
                            </td>
                            <td>
                                {{$item->status == 1 ? 'Active' : 'Deactive'}}
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.brand.detail',['slug' => $item->slug, 'id' => $item->id])}}"><i class="fas fa-user-edit fa-1x"></i></a>
                            </td>
                            <td>
                                <button id="{{$item->id}}" class="btn btn-danger js-delete-brand"><i class="fas fa-trash-alt fa-1x"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        {{--    phan trang    --}}
        <div class="row">
            <div class="col">
                {{$listBrands->appends(request()->query())->links()}}
            </div>
        </div>
    </div>
@endsection
@push('javascripts')
    <script type="text/javascript">
        $(function () {
            $('.js-search-brand').on('click', function () {
                var status = $('.js-status-brand').val().trim();
                var keyword = $('.js-keyword-brand').val().trim();
                var urlSearch = "{{route('admin.brand')}}";
                window.location.href = urlSearch + "?keyword="+keyword+"&status="+status;
            });

            $('.js-delete-brand').on('click', function () {
                var self = $(this);
                var id = $.trim(self.attr('id'));
                if($.isNumeric(id)){
                    $.ajax({
                        url: "{{route('admin.brand.delete')}}",
                        type: "post",
                        data: {id: id},
                        beforeSend: function () {
                            self.html('<i class="fas fa-spinner fa-1x"></i>');
                        },
                        success: function (result) {
                            self.html('<i class="fas fa-trash-alt fa-1x"></i>');
                            result = $.trim(result);
                            if(result === 'ok'){
                                alert('Xoa thanh cong');
                                window.location.reload(true);
                            } else {
                                alert('Xoa khong thanh cong');
                            }
                        }
                    })
                }
            });
        })
    </script>
@endpush
