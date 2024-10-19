@extends('shop_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(public/kidolshop/images/spbn.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Danh Sách Yêu Thích</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh Sách Yêu Thích</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Cart Start-->
<div class="cart-page section-padding-5">
    <div class="container">
        <div class="col-xl-12 col-md-12">
            <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                <div class="tab-pane fade active show">
                    <div class="my-account-order account-wrapper">
                        <table id="example" class="table table-striped table-bordered wishlist-table" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="no text-center">STT</th>
                                    <th class="name" style="width:10%;">Hình Ảnh</th>
                                    <th class="date">Sản Phẩm</th>
                                    <th class="date">Giá</th>
                                    <th class="action text-center" style="width:10%;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>             
                                @foreach($wishlist as $key => $wish)                     
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <?php $image = json_decode($wish->ImageName)[0]; ?>
                                    <td>
                                        <a href="{{URL::to('/shop-single/'.$wish->ProductSlug)}}"><img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" alt=""></a>
                                    </td>
                                    <td>
                                        <div><a href="{{URL::to('/shop-single/'.$wish->ProductSlug)}}">{{$wish->ProductName}}</a></div>
                                        <div>Mã sản phẩm: {{$wish->idProduct}}</div>
                                        <div class="text-primary">Còn Lại: {{$wish->QuantityTotal}}</div>
                                    </td>

                                    <td>{{$wish->Price}}</td>            

                                    <td class="text-center">
                                        <a class="view-hover h3 d-block delete-wish" data-id="{{$wish->idWish}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cart End-->

<script>
    $(document).ready(function()
    {
        APP_URL = '{{url('/')}}' ;
        $('body').tooltip({selector: '[data-toggle="tooltip"]'});
        $('#example').DataTable();

        $('.delete-wish').on('click',function(){
            var _token = $('input[name="_token"]').val();
            var idWish = $(this).data("id");

            $.ajax({
                url: APP_URL + '/delete-wish/'+idWish,
                method: 'DELETE',
                data: {_token:_token},
                success:function(data){
                    location.reload();
                }
            });
        });
    });  
</script>

@endsection