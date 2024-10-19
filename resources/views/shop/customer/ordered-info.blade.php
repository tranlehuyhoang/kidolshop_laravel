@extends('shop_layout')
@section('content')

<?php use Illuminate\Support\Facades\Session; ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(../public/kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Chi Tiết Đơn Hàng</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Cart Start-->
<div class="cart-page section-padding-5">
    <div class="container">
        <div class="container__address">
            <div class="container__address-css"></div>
            <div class="container__address-content">
                <div class="container__address-content-hd justify-content-between">
                    <div><i class="container__address-content-hd-icon fa fa-map-marker"></i>Địa Chỉ Nhận Hàng</div>
                </div>
                <ul class="shipping-list list-address">
                    <li class="cus-radio align-items-center" style="font-size:20px;">
                        <span class="mr-2">{{$address->CustomerName}}</span>
                        <span class="mr-2">{{$address->PhoneNumber}}</span>
                        <span>{{$address->Address}}</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="cart-table table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="image">Hình Ảnh</th>
                        <th class="product">Sản Phẩm</th>
                        <th class="price">Giá</th>
                        <th class="quantity" style="width:10%">Số Lượng</th>
                        <th class="total">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $Total = 0; $ship = 0; $total_bill = 0; $discount = 0; ?>
                    @foreach($list_bill_info as $key => $bill_info)
                        <?php $Total += ($bill_info->Price * $bill_info->QuantityBuy); ?>
                    <tr class="product-item">
                        <?php $image = json_decode($bill_info->ImageName)[0]; ?>
                        <td class="image">
                            <a href="{{URL::to('/shop-single/'.$bill_info->ProductSlug)}}"><img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" alt=""></a>
                        </td>
                        <td class="product">
                            <a href="{{URL::to('/shop-single/'.$bill_info->ProductSlug)}}">{{$bill_info->ProductName}}</a>
                            <span>Mã sản phẩm: {{$bill_info->idProduct}}</span>
                            <span>{{$bill_info->AttributeProduct}}</span>
                        </td>
                        <td class="price">{{number_format($bill_info->Price,0,',','.')}}đ</td>
                        <td class="quantity">{{$bill_info->QuantityBuy}}</td>
                        <td class="total">{{number_format($bill_info->Price * $bill_info->QuantityBuy,0,',','.')}}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="cart-totals shop-single-content">
                    <div class="cart-title">
                        <h4 class="title">Tổng giỏ hàng</h4>
                    </div>
                    <div class="cart-total-table mt-25" style="position:relative;">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Tổng tiền hàng</td>
                                    <td class="text-right">{{number_format($Total,0,',','.')}}đ</td>
                                </tr>
                                @if($Total < 1000000) @php $ship = '30000'; $total_bill = $Total + $ship; @endphp
                                @else @php $ship = 'Miễn phí'; $total_bill = $Total; @endphp @endif
                                <tr class="shipping">
                                    <td>Phí vận chuyển (Miễn phí vận chuyển cho đơn hàng trên 1.000.000đ)</td>
                                    <td class="text-right">
                                            @if($ship > 0) {{number_format($ship,0,',','.')}}đ
                                            @else {{$ship}} @endif
                                    </td>
                                </tr>

                                @if($address->Voucher != '') 
                                <tr>
                                    <td width="70%">Mã giảm giá</td>
                                    @php
                                        $Voucher = explode("-",$address->Voucher);
                                        $VoucherCondition = $Voucher[1];
                                        $VoucherNumber = $Voucher[2];
                                        if($VoucherCondition == 1) $discount = ($Total/100) * $VoucherNumber;
                                        else{
                                            $discount = $VoucherNumber;
                                            if($discount > $Total) $discount = $Total;
                                        } 

                                        $total_bill =  $total_bill - $discount;
                                        if($total_bill < 0) $total_bill = $ship;
                                    @endphp
                                    <td class="text-right totalBill">- {{number_format($discount,0,',','.')}}đ</td>
                                </tr>
                                @endif

                                <tr>
                                    <td width="70%">Thành tiền</td>
                                    <td class="text-right totalBill">{{number_format($total_bill,0,',','.')}}đ</td>
                                </tr>

                                <input type="hidden" class="subtotal" value="{{$Total}}">
                                <input type="hidden" name="TotalBill" class="totalBillVal" value="{{$total_bill}}">    
                                <input type="hidden" name="idVoucher" class="idVoucher" value="0">                                
                            </tbody>
                        </table>
                        @if($address->Payment == 'vnpay')
                        <div class="col-lg-3 paid_tag">
                            <div class="h3 p-3 mb-0 text-primary">Đã thanh toán</div>
                        </div>
                        @endif
                    </div>
                    <!-- <div class="container__address-content">
                        <div class="container__address-content-hd">
                            <i class="container__address-content-hd-icon fa fa-money"></i>
                            <div>Phương thức thanh toán</div>
                        </div>
                        <ul class="shipping-list checkout-payment">
                            <li class="cus-radio">
                                <input type="radio" name="checkout" value="cash" onclick="removeDiv()" id="cash" checked>
                                <label for="cash">
                                    <span>Thanh toán khi nhận hàng</span>
                                </label>
                            </li>
                            <li class="cus-radio payment-radio">
                                <input type="radio" name="checkout" onclick="showMomoModal()" value="momo" id="momo" >
                                <label for="momo">
                                    <span>Momo</span>
                                </label>
                            </li>
                            <li class="cus-radio payment-radio">
                                <input type="radio" name="checkout" onclick="showZaloModal()" value="zalo" id="zalo" >
                                <label for="zalo">
                                    <span>Zalo Pay</span>
                                </label>
                            </li>
                        </ul>                   
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cart End-->

@endsection