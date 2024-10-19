@extends('shop_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(public/kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Đơn đặt hàng</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đơn đặt hàng</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->


<!--My Account Start-->
<div class="register-page section-padding-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="my-account-menu mt-30">
                    <ul class="nav account-menu-list flex-column">
                        <li>
                            <a href="{{URL::to('/account')}}"><i class="fa fa-user"></i> Hồ Sơ</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/change-password')}}"><i class="fa fa-key"></i> Đổi Mật Khẩu</a>
                        </li>
                        <li>
                            <a class="active"><i class="fa fa-shopping-cart"></i> Đơn Đặt Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                    <div class="tab-pane fade active show">
                        <div class="my-account-order account-wrapper">
                            <h4 class="account-title mb-15">Đơn Đặt Hàng</h4>
                            <div class="row pt-30 pb-30 mb-25" style="border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5; justify-content: space-evenly;">
                                <a class="col-xl-2 col-md-2 text-center view-hover text-primary" style="position:relative;">
                                    <i class="fa fa-envelope" style="font-size:24px;"></i>
                                    <div>Tất cả</div>
                                    @if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->count() > 0)
                                    <span class="qty-ordered">{{App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->count()}}</span> @endif
                                </a>
                                <a href="{{URL::to('/order-waiting')}}" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;">
                                    <i class="fa fa-inbox" style="font-size:24px;"></i>
                                    <div>Chờ xác nhận</div>
                                    @if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','0')->count() > 0)
                                    <span class="qty-ordered">{{App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','0')->count()}}</span> @endif
                                </a>
                                <a href="{{URL::to('/order-shipping')}}" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;"> 
                                    <i class="fa fa-plane" style="font-size:24px;"></i>
                                    <div>Đang giao</div>
                                    @if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','1')->count() > 0)
                                    <span class="qty-ordered">{{App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','1')->count()}}</span> @endif
                                </a>
                                <a href="{{URL::to('/order-shipped')}}" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;"> 
                                    <i class="fa fa-check-circle" style="font-size:24px;"></i>
                                    <div>Đã giao</div>
                                    @if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','2')->count() > 0)
                                    <span class="qty-ordered">{{App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','2')->count()}}</span> @endif
                                </a>
                                <a href="{{URL::to('/order-cancelled')}}" class="col-xl-2 col-md-2 text-center view-hover" style="position:relative;">
                                    <i class="fa fa-times" style="font-size:24px;"></i>
                                    <div>Đã hủy</div>
                                    @if(App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','99')->count() > 0)
                                    <span class="qty-ordered">{{App\Models\Bill::where('idCustomer',Session::get('idCustomer'))->where('Status','99')->count()}}</span> @endif
                                </a>
                            </div>
                            <!-- <div class="account-table text-center mt-25 table-responsive"> -->
                                <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th class="no">Mã ĐH</th>
                                            <th class="name">Tên người nhận</th>
                                            <th class="date">Ngày đặt</th>
                                            <th class="status">Trạng thái</th>
                                            <th class="total">Tổng tiền</th>
                                            <th class="action text-center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>             
                                        @foreach($list_bill as $key => $bill)                     
                                        <tr>
                                            <td>{{$bill->idBill}}</td>
                                            <td>{{$bill->CustomerName}}</td>
                                            <td>{{$bill->created_at}}</td>           

                                            @if($bill->Status == 0) <td>Chờ xác nhận...</td>
                                            @elseif($bill->Status == 1) <td>Đang giao</td>
                                            @elseif($bill->Status == 2) <td>Đã giao</td>
                                            @else <td>Đã hủy</td> @endif

                                            <td>{{number_format($bill->TotalBill,0,',','.')}}đ</td>

                                            <form action="{{URL::to('/confirm-bill/'.$bill->idBill)}}" method="POST"> @csrf
                                            <td class="d-flex justify-content-center">
                                                <a class="view-hover h3 mr-2" href="{{URL::to('/ordered-info/'.$bill->idBill)}}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xem chi tiết"><i class="fa fa-eye"></i></a>
                                                @if($bill->Status == 0)
                                                <a class="view-hover h3 ml-2 delete-bill-btn" data-toggle="modal" data-target="#modal-delete-bill" data-id="{{$bill->idBill}}"><i class="fa fa-trash"></i></a>                                
                                                @endif
                                                <!-- <button class="view-hover h3" style=" border:none; background-color: transparent;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xác nhận hoàn thành"><i class="fa fa-check-circle"></i></button>
                                                <input type="hidden" name="Status" value="2"> -->
                                            </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--My Account End-->

<!-- Modal hủy đơn hàng -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-bill"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thông báo</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="content-delete"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                <button id="delete-bill-confirm" type="button" class="btn btn-primary">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.scrollBy(0,300);
    $(document).ready(function(){  
        $('#example').DataTable();
        $('body').tooltip({selector: '[data-toggle="tooltip"]'});
        APP_URL = '{{url('/')}}' ;

        $(".delete-bill-btn").on("click", function() {
            var idBill = $(this).data("id");
            console.log(idBill);
            $(".content-delete").html("Bạn có muốn hủy đơn hàng #" +idBill+ " không?");

            $("#delete-bill-confirm").on("click", function() {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: APP_URL + '/delete-bill/' +idBill,
                    method: 'POST',
                    data: {_token:_token},
                    success:function(data){
                        location.reload();
                    }
                });
            });
        });
    });
</script>

@endsection