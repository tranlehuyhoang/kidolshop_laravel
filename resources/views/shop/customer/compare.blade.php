@extends('shop_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(public/kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">So Sánh Sản Phẩm</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">So sánh sản phẩm</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<?php use App\Http\Controllers\ProductController; ?>

<!--Cart Start-->
<div class="cart-page section-padding-5">
    <div class="container">
        <div class="cart-table compare-table table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:10%;">Sản Phẩm</th>
                        @foreach($list_compare as $key => $compare)
                        <td style="width:30%; vertical-align:unset;">
                            <div class="product-image-title">
                                <?php $image = json_decode($compare->ImageName)[0];?>
                                <a class="product-image" href="{{URL::to('/shop-single/'.$compare->ProductSlug)}}"><img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" alt="product"></a>
                                <h5 class="title"><a class="view-hover" href="{{URL::to('/shop-single/'.$compare->ProductSlug)}}">{{$compare->ProductName}}</a></h5>
                            </div>
                        </td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        @foreach($list_compare as $key => $compare)
                        <td style="vertical-align:unset;"><div style="text-align:justify;">{!!$compare->DesProduct!!}</div></td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Giá</th>
                        @foreach($list_compare as $key => $compare)
                            <?php
                                $SalePrice = $compare->Price;  
                                $get_time_sale = ProductController::get_sale_pd($compare->idProduct); 
                                if($get_time_sale) $SalePrice = $SalePrice - ($SalePrice/100) * $get_time_sale->Percent;
                            ?>
                        <td><span class="current-price text-primary">{{number_format(round($SalePrice,-3),0,',','.')}}đ</span></td>
                        @endforeach
                    </tr>
                    <tr>
                        <th>Xem chi tiết</th>
                        @foreach($list_compare as $key => $compare)
                        <td><a href="{{URL::to('/shop-single/'.$compare->ProductSlug)}}" class="btn btn-primary">Xem chi tiết</a></td>
                        @endforeach
                    </tr>
                    <!-- <tr>
                        <th>Xóa</th>
                        @foreach($list_compare as $key => $compare)
                        <td><a href="compare.php?del_idpro=" class="btn btn-secondary">Xóa</a></td>
                        @endforeach
                    </tr>  -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Cart End-->

@endsection