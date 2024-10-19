@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<form action="{{URL::to('/submit-edit-sale/'.$sale_product->idSale.'/'.$sale_product->idProduct)}}" method="POST" id="form-edit-sale" data-toggle="validator" enctype="multipart/form-data" autocomplete="off">
@csrf
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12 alert-pd">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Sửa khuyến mãi</h4>
                        </div>
                    </div>
                    <?php
                        $message = Session::get('message');
                        $error = Session::get('error');
                        if($message){
                            echo '<span class="text-success ml-3 mt-3">'.$message.'</span>';
                            Session::put('message', null);
                        }else if($error){
                            echo '<span class="text-danger ml-3 mt-3">'.$error.'</span>';
                            Session::put('error', null);
                        }
                    ?> 
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">  
                                <label>Sản phẩm</label>                    
                                <div class="d-flex align-items-center mb-3">
                                    <?php $image = json_decode($sale_product->ImageName)[0];?>
                                    <img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                    <div style="color:#000;">{{$sale_product->ProductName}}</div>
                                </div>
                            </div>
                            <div class="col-md-12">                      
                                <div class="form-group">
                                    <label>Tên chương trình khuyến mãi</label>
                                    <input id="SaleName" name="SaleName" type="text" value="{{$sale_product->SaleName}}" class="form-control" placeholder="Vui lòng nhập tên" data-errors="Please Enter Name." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Thời gian bắt đầu</label>
                                    <input type='text' name="SaleStart" id='SaleStart' value="{{$sale_product->SaleStart}}" placeholder="Nhập thời gian bắt đầu" class="form-control" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Thời gian kết thúc</label>
                                    <input type='text' name="SaleEnd" id='SaleEnd' value="{{$sale_product->SaleEnd}}" placeholder="Nhập thời gian kết thúc" class="form-control" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">                                    
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input id="Percent" name="Percent" type="number" value="{{$sale_product->Percent}}" min="1" max="100" class="form-control" placeholder="% Giảm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>                            
                        <input type="submit" class="btn btn-primary mr-2" value="Sửa khuyến mãi" data-toggle="modal" data-target=".bd-example-modal-sm">
                        <a href="{{URL::to('/manage-sale')}}" class="btn btn-light">Trở về</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->
</form>

<!-- Tạo datetimepicker form -->
<script>
    $(document).ready(function(){  
        jQuery.datetimepicker.setLocale('vi');
        // $.datetimepicker.setDateFormatter('moment');
        jQuery(function(){
            jQuery('#SaleStart').datetimepicker({
                // format: 'DD-MM-YYYY HH:mm',
                format:'Y-m-d H:i',
                // timepicker: false,
                onShow:function( ct ){
                    this.setOptions({
                        maxDate:jQuery('#SaleEnd').val()?jQuery('#SaleEnd').val():false
                    })
                }
            });
            jQuery('#SaleEnd').datetimepicker({
                // format: 'DD-MM-YYYY HH:mm',
                format:'Y-m-d H:i',
                // timepicker: false,
                onShow:function( ct ){
                    this.setOptions({
                        minDate:jQuery('#SaleStart').val()?jQuery('#SaleStart').val():false
                    })
                }
            });
        });
    });
</script>

<!-- Validate thời gian sale -->
<script>
    $(document).ready(function(){  
        Validator({
            form: "#form-add-sale",
            errorSelector: ".text-danger",
            parentSelector: ".form-group",
            rules:[
                Validator.isRequired("#SaleStart"),
                Validator.isRequired("#SaleEnd"),
                Validator.isSaleEndTimeSysdate("#SaleEnd"),
                Validator.isSaleEndTime("#SaleEnd",function(){
                return  document.querySelector("#form-add-sale #SaleStart").value;
                }),
                Validator.isSaleStartTime("#SaleStart",function(){
                return  document.querySelector("#form-add-sale #SaleEnd").value;
                })
            ]
        })
    });
</script>

@endsection

