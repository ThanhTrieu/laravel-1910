@extends('admin.admin-layout')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add product</h1>
            <a href="{{route('admin.list.products')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> List products</a>
        </div>
        <form class="border p-3" action="{{route('admin.handle.add.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label for="nameProduct">Ten san pham (*)</label>
                        <input type="text" class="form-control" id="nameProduct" name="nameProduct" />
                    </div>
                    <div class="form-group">
                        <label for="brandProduct">Thuong hieu (*)</label>
                        <select class="form-control js-search-brand" name="brandProduct" id="brandProduct">
                            <option value=""> -- Chon thuong hieu --</option>
                            @foreach($brands as $key => $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qtyProduct">So luong (*)</label>
                        <input type="number" id="qtyProduct" name="qtyProduct" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="saleProduct">Giam gia (%)</label>
                        <input type="number" id="saleProduct" name="saleProduct" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="hotProduct">San pham moi (*)</label>
                        <select class="form-control" name="hotProduct" id="hotProduct">
                            <option value="0"> No </option>
                            <option value="1"> Yes </option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="border p-2">
                        <div class="form-group">
                            <label for="versionProduct">Theo Phien ban</label>
                            <input value="1" type="radio" name="choseTypeProduct" id="versionProduct"/>

                            <span> &nbsp;&nbsp;&nbsp;&nbsp; </span>

                            <label for="colorProduct">Theo Mau sac</label>
                            <input value="2" type="radio" name="choseTypeProduct" id="colorProduct"/>
                        </div>
                        <div style="display: none" class="form-group" id="choseTypeVersionProduct">
                            <div class="form-group">
                                <select class="form-control js-search-version w-100" name="version">
                                    <option value="">-- chon phien ban --</option>
                                    @foreach($versions as $key => $v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div style="display: none" class="form-group" id="choseTypeColorProduct">
                            <div class="form-group">
                                <select class="form-control js-search-color w-100" name="color">
                                    <option value="">-- chon mau sac --</option>
                                    @foreach($colors as $key => $c)
                                        <option value="{{$c->id}}">{{$c->text_color}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label for="priceProduct">Gia san pham (*)</label>
                        <input type="number" id="priceProduct" name="priceProduct" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row border p-2">
                <div class="col">
                    <div class="input-field">
                        <label for="imageProducts">Images of Product</label>
                        <div class="input-images" type="text" name="imageProducts" id="imageProducts"></div>
                    </div>
                </div>
            </div>
            <div class="row border p-2 my-3">
                <div class="col">
                    <label for="postProduct">Bai viet ve san pham</label>
                    <textarea class="form-control" id="postProduct" name="postProduct"></textarea>
                </div>
            </div>
            <div class="row border p-2 my-3">
                <div class="col">
                    <label for="propertyProduct">Thong so ky thuat</label>
                    <textarea class="form-control" id="propertyProduct" name="propertyProduct"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-lg">Submit</button>
        </form>
    </div>
@endsection
@push('javascripts')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        CKEDITOR.replace('postProduct', {
            customConfig : 'config.js',
            toolbar : 'simple',
            height: 500
        });
        CKEDITOR.replace('propertyProduct', {
            customConfig : 'config.js',
            toolbar : 'simple',
            height: 500
        });

        function matchCustom(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Do not display the item if there is no 'text' property
            if (typeof data.text === 'undefined') {
                return null;
            }

            // `params.term` should be the term that is used for searching
            // `data.text` is the text that is displayed for the data object
            if (data.text.indexOf(params.term) > -1) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text += ' (matched)';

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        $(function () {
            $('.input-images').imageUploader();
            $(".js-search-brand").select2({
                width: '100%',
                matcher: matchCustom
            });
            $(".js-search-version").select2({
                width: '100%',
                matcher: matchCustom
            });
            $(".js-search-color").select2({
                width: '100%',
                matcher: matchCustom
            });
            $('input[name="choseTypeProduct"]').click(function () {
                var self = $(this);
                var type = self.val().trim();
                $('#choseTypeVersionProduct').hide();
                $('#choseTypeColorProduct').hide();
                if(type === '1'){
                    // chon theo phien ban
                    $('#choseTypeVersionProduct').show();
                } else if(type === '2') {
                    // chon theo mau sac
                    $('#choseTypeColorProduct').show();
                }
            });
        })
    </script>
@endpush
