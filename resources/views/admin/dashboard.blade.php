@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-transparent card-block card-stretch card-height border-none">
                    <div class="card-body p-0 mt-lg-2 mt-0">
                        <h3 class="mb-3">Hi <?php echo Session::get('AdminName'); ?>, Good Morning</h3>
                        <p class="mb-0 mr-4">
                            Trang tổng quan của bạn cung cấp cho bạn các quan điểm về hiệu suất chính hoặc quy trình kinh doanh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-info-light">
                                        <img src="public/kidoldash/images/product/1.png" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng Doanh Thu</p>
                                        <h4>{{number_format($total_revenue,0,',','.')}}đ</h4>
                                    </div>
                                </div>                                
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-info iq-progress progress-1" data-percent="85">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4 card-total-sale">
                                    <div class="icon iq-icon-box-2 bg-success-light">
                                        <img src="public/kidoldash/images/product/3.png" class="img-fluid" alt="image">
                                    </div>
                                    <div>
                                        <p class="mb-2">Tổng Sản Phầm Bán Ra</p>
                                        <h4>{{number_format($total_sell,0,',','.')}} sản phẩm</h4>
                                    </div>
                                </div>
                                <div class="iq-progress-bar mt-2">
                                    <span class="bg-success iq-progress progress-1" data-percent="75">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Doanh Thu Cửa Hàng</h4>
                        </div>
                        <form class="col-lg-6 p-0"> @csrf
                        <div class="row">
                            <input type='text' name="DateFrom" id='DateFrom' placeholder="Từ ngày" class="form-control ml-2" style="width:44%;"/>
                            <input type='text' name="DateTo" id='DateTo' placeholder="Đến ngày" class="form-control ml-2" style="width:44%;"/>
                            <button type="button" class="badge badge-info p-0 statistic-btn" style="border:none; width:7%; margin-left:12px; font-size:20px;" data-toggle="tooltip" data-placement="top" title="" 
                                data-original-title="Tìm kiếm"><i class="ri-search-line"></i>
                            </button>
                        </div>
                        </form>
                        <form class="col-lg-3 p-0"> @csrf
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="chart-by-days">Lọc theo</label>
                            </div>
                            <select class="custom-select" id="chart-by-days">
                                <!-- <option selected="">Choose...</option> -->
                                <option value="lastweek">7 ngày qua</option>
                                <option value="lastmonth">30 ngày qua</option>
                                <option value="lastyear">365 ngày qua</option>
                            </select>
                        </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div id="chart-sale" style="height: 250px;"></div>
                    </div>
                </div>
            </div>  
            <div class="col-lg-8">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Top Sản Phẩm Bán Chạy</h4>
                        </div>
                        <div class="card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton006"
                                    data-toggle="dropdown">
                                    <span class="topPro-default">Trong Tháng</span><i class="ri-arrow-down-s-line ml-1"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right shadow-none"
                                    aria-labelledby="dropdownMenuButton006">
                                    <button type="button" class="dropdown-item select-topPro">Trong Năm</button>
                                    <button type="button" class="dropdown-item select-topPro">Trong Tháng</button>
                                    <button type="button" class="dropdown-item select-topPro">Trong Tuần</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body list-topPro" style="padding-bottom:4px;">
                        <ul class="list-unstyled row mb-0">
                            @foreach($list_topProduct as $key => $topProduct)
                            <li class="col-lg-4 topPro-item">
                                <div class="card card-block card-stretch mb-0">
                                    <div class="card-body">
                                        <div class="bg-warning-light rounded">
                                            <?php $image = json_decode($topProduct->ImageName)[0];?>
                                            <img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" class="style-img img-fluid m-auto p-3" alt="image">
                                        </div>
                                        <div class="style-text text-left mt-3">
                                            <h5 class="mb-1 limit-2-lines">{{$topProduct->ProductName}}</h5>
                                            <p class="mb-0">Đã bán: {{number_format($topProduct->Sold,0,',','.')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">  
                <div class="card card-transparent card-block card-stretch mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between p-0">
                        <div class="header-title">
                            <h4 class="card-title mb-0">Best Product All Time</h4>
                        </div>
                    </div>
                </div>
                <div class="card card-block card-stretch card-height-helf">
                    @foreach($list_topProduct_AllTime as $key => $topProduct_AllTime)
                    <div class="card-body--AllTime card-item-right">
                        <div class="d-flex align-items-top">
                            <div class="iq-avatar d-flex align-items-center">
                                <?php $image = json_decode($topProduct_AllTime->ImageName)[0];?>
                                <img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" class="p-0 avatar-100 style-img img-fluid m-auto rounded" alt="image">
                            </div>
                            <div class="style-text text-left">
                                <h5 class="mb-2 limit-2-lines">{{$topProduct_AllTime->ProductName}}</h5>
                                <span class="mb-2">Tổng đã bán: {{number_format($topProduct_AllTime->Sold,0,',','.')}}</span>
                                <p class="mb-0">Tổng doanh thu: {{number_format($topProduct_AllTime->Sold * $topProduct_AllTime->Price,0,',','.')}}đ</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>   
        </div>
    </div>
</div>
<!-- Page end  -->

<!-- Tạo datetimepicker form -->
<script>
    $(document).ready(function(){  
        APP_URL = '{{url('/')}}' ;
        jQuery.datetimepicker.setLocale('vi');
        jQuery(function(){
            jQuery('#DateFrom').datetimepicker({
                // format: 'DD-MM-YYYY HH:mm',
                format:'Y-m-d',
                // timepicker: false,
                onShow:function( ct ){
                    this.setOptions({
                        maxDate:jQuery('#DateTo').val()?jQuery('#DateTo').val():false
                    })
                }
            });
            jQuery('#DateTo').datetimepicker({
                // format: 'DD-MM-YYYY HH:mm',
                format:'Y-m-d',
                // timepicker: false,
                onShow:function( ct ){
                    this.setOptions({
                        minDate:jQuery('#DateFrom').val()?jQuery('#DateFrom').val():false
                    })
                }
            });
        });

        chart_7days();

        var chart = new Morris.Bar({
            element: 'chart-sale',
            barColors: ['orange','#32BDEA','#FF9DBE'],
            gridTextColor: ['orange','#32BDEA','#FF9DBE'],
            pointFillColors: ['#fff'],
            pointStrokeColors: ['black'],
            fillOpacity: 1,
            hideHover: 'auto',
            parseTime: false, 
            xkey: 'Date',
            ykeys: ['TotalSold','Sale','QtyBill'],
            behaveLikeLine: true,
            labels: ['Số lượng bán','Doanh thu','Đơn hàng'],
        });

        function chart_7days(){
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: APP_URL + '/chart-7days',
                method: 'POST',
                dataType: 'JSON',
                data: {_token:_token},
                success:function(data){
                    chart.setData(data);
                }
            });
        }

        $('.statistic-btn').on("click", function(){
            var DateFrom = $('#DateFrom').val();
            var DateTo = $('#DateTo').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: APP_URL + '/statistic-by-date',
                method: 'POST',
                dataType: 'JSON',
                data: {DateFrom:DateFrom,DateTo:DateTo,_token:_token},
                success:function(data){
                    chart.setData(data);
                }
            });
        });

        $('#chart-by-days').on("change", function(){
            var Days = $(this).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: APP_URL + '/statistic-by-date-order',
                method: 'POST',
                dataType: 'JSON',
                data: {Days:Days,_token:_token},
                success:function(data){
                    chart.setData(data);
                }
            });
        });

        $('.select-topPro').on("click", function(){
            var Days = $(this).html();
            var _token = $('input[name="_token"]').val();
            var sort_by = '';
            
            $('.topPro-default').html(Days);
            if(Days == 'Trong Tuần') sort_by = 'week';
            else if(Days == 'Trong Tháng') sort_by = 'month';
            else if(Days == 'Trong Năm') sort_by = 'year';

            $.ajax({
                url: APP_URL + '/topPro-sort-by-date',
                method: 'POST',
                data: {sort_by:sort_by,_token:_token},
                success:function(data){
                    $('.list-topPro').html(data);
                }
            });
        });
    });
</script>

@endsection