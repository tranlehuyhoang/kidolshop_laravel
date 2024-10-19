@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<form action="{{URL::to('/submit-edit-voucher/'.$voucher->idVoucher)}}" method="POST" id="form-edit-voucher" data-toggle="validator" enctype="multipart/form-data" autocomplete="off">
@csrf
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12 alert-pd">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Sửa mã giảm giá</h4>
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
                                <div class="form-group">
                                    <label>Tên mã giảm giá *</label>
                                    <input id="VoucherName" name="VoucherName" type="text" class="form-control" placeholder="Vui lòng nhập tên" value="{{$voucher->VoucherName}}" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Mã giảm giá *</label>
                                    <input id="VoucherCode" name="VoucherCode" type="text" class="form-control" placeholder="Vui lòng nhập mã" value="{{$voucher->VoucherCode}}">
                                    <span class="text-danger"></span>
                                </div>
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Số lượng *</label>
                                    <input id="VoucherQuantity" name="VoucherQuantity" type="number" min="0" class="form-control" placeholder="Vui lòng nhập số lượng mã" value="{{$voucher->VoucherQuantity}}" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="VoucherCondition">Hình thức *</label>
                                    <select id="VoucherCondition" name="VoucherCondition" class="selectpicker form-control" data-style="py-0" required>
                                        <option value="{{$voucher->VoucherCondition}}">@if($voucher->VoucherCondition == 1) Phần trăm @else Tiền mặt @endif</option>
                                        <option value="1">Phần trăm</option>
                                        <option value="2">Tiền mặt</option>
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div> 
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Phần trăm/Số tiền giảm *</label>
                                    <input id="VoucherNumber" name="VoucherNumber" type="number" min="0" class="form-control" placeholder="Vui lòng nhập phần trăm hoặc số tiền giảm" value="{{$voucher->VoucherNumber}}" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Thời gian bắt đầu *</label>
                                    <input type='text' name="VoucherStart" id='VoucherStart' placeholder="Nhập thời gian bắt đầu" class="form-control" value="{{$voucher->VoucherStart}}"/>
                                    <span class="text-danger"></span>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Thời gian kết thúc *</label>
                                    <input type='text' name="VoucherEnd" id='VoucherEnd' placeholder="Nhập thời gian kết thúc" class="form-control" value="{{$voucher->VoucherEnd}}"/>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>                            
                        <input type="submit" class="btn btn-primary mr-2" value="Sửa mã giảm giá" data-toggle="modal" data-target=".bd-example-modal-sm">
                        <a href="{{URL::to('/manage-voucher')}}" class="btn btn-light">Trở về</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Page end  -->

<!-- Tạo datetimepicker form -->
<script>
    $(document).ready(function(){  
        jQuery.datetimepicker.setLocale('vi');
        // $.datetimepicker.setDateFormatter('moment');
        jQuery(function(){
            jQuery('#VoucherStart').datetimepicker({
                // format: 'DD-MM-YYYY HH:mm',
                format:'Y-m-d H:i',
                // timepicker: false,
                onShow:function( ct ){
                    this.setOptions({
                        maxDate:jQuery('#VoucherEnd').val()?jQuery('#VoucherEnd').val():false
                    })
                }
            });
            jQuery('#VoucherEnd').datetimepicker({
                // format: 'DD-MM-YYYY HH:mm',
                format:'Y-m-d H:i',
                // timepicker: false,
                onShow:function( ct ){
                    this.setOptions({
                        minDate:jQuery('#VoucherStart').val()?jQuery('#VoucherStart').val():false
                    })
                }
            });
        });
    });
</script>

<!-- Validate thời gian voucher -->
<script>
    $(document).ready(function(){  
        Validator({
            form: "#form-edit-voucher",
            errorSelector: ".text-danger",
            parentSelector: ".form-group",
            rules:[
                Validator.isRequired("#VoucherStart"),
                Validator.isRequired("#VoucherEnd"),
                Validator.isRequired("#VoucherCode"),
                Validator.isCode("#VoucherCode"),
                Validator.isSaleEndTimeSysdate("#VoucherEnd"),
                Validator.isSaleEndTime("#VoucherEnd",function(){
                return  document.querySelector("#form-edit-voucher #VoucherStart").value;
                }),
                Validator.isSaleStartTime("#VoucherStart",function(){
                return  document.querySelector("#form-edit-voucher #VoucherEnd").value;
                }),
                Validator.isCodeNumber("#VoucherNumber",function(){
                return  document.querySelector("#form-edit-voucher #VoucherCondition").value;
                })
            ]
        })
    });
</script>

@endsection

