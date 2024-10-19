@extends('admin_layout')
@section('content_dash')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Sản Phẩm ( Tổng: {{$count_product}} sản phẩm )</h4>
                        <p class="mb-0">Danh sách sản phẩm quyết định hiệu quả việc trình bày sản phẩm và cung cấp không gian <br> để liệt kê các sản phẩm và dịch vụ của bạn theo cách hấp dẫn nhất.</p>
                    </div>
                    <a href="{{URL::to('/add-product')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm sản phẩm</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                    <th> Mã SP</th>
                                    <th> Sản phẩm </th>
                                    <th> Danh mục </th>
                                    <th> Thương hiệu </th>
                                    <th> Số lượng </th>
                                    <th> Trạng Thái </th>
                                    <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($list_product as $key => $product)
                            <tr>
                                <td>{{$product->idProduct}}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php $image = json_decode($product->ImageName)[0];?>
                                        <img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                        <div>{{$product->ProductName}}</div>        
                                    </div>
                                </td>
                                <td>{{$product->CategoryName}}</td>
                                <td>{{$product->BrandName}}</td>
                                <td>{{$product->QuantityTotal}}</td>
                                @if($product->StatusPro == 1) <td><strong>Đang Hiện</strong></td>
                                @else <td><strong>Đang Ẩn</strong></td> @endif
                                <td>
                                    <form> @csrf
                                    <div class="d-flex align-items-center list-action">
                                        @if($product->StatusPro == 0)
                                        <button type="button" class="badge badge-dark mr-2 btn-StatusPro" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hiện"
                                            style="border:none;" data-id="{{$product->idProduct}}" data-statuspro="1"><i class="fa fa-eye-slash"></i></i></button>
                                        @else
                                        <button type="button" class="badge badge-primary mr-2 btn-StatusPro" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ẩn"
                                            style="border:none;" data-id="{{$product->idProduct}}" data-statuspro="0"><i class="fa fa-eye"></i></i></button>
                                        @endif
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"
                                            href="{{URL::to('/edit-product/'.$product->idProduct)}}"><i class="ri-pencil-line mr-0"></i></a>
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-tooltip="tooltip" data-target="#modal-delete-{{$product->idProduct}}" data-placement="top" title="Xóa" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                    </form>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-{{$product->idProduct}}"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có muốn xóa sản phẩm {{$product->ProductName}} không?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                            <a href="{{URL::to('/delete-product/'.$product->idProduct)}}" type="button" class="btn btn-primary">Xác nhận</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

<script>
    $(document).ready(function(){  
        APP_URL = '{{url('/')}}' ;

        $('.btn-StatusPro').on('click',function(){
            var idProduct = $(this).data("id");
            var StatusPro = $(this).data("statuspro");
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    url: APP_URL + '/change-status-product/' +idProduct,
                    method: 'POST',
                    data: {StatusPro:StatusPro,_token:_token},
                    success:function(data){
                        location.reload();
                    }
            });
        });
    });
</script>

@endsection