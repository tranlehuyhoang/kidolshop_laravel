@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<form action="{{URL::to('/submit-add-sale')}}" method="POST" id="form-add-sale" data-toggle="validator" enctype="multipart/form-data" autocomplete="off">
@csrf
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12 alert-pd">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm khuyến mãi</h4>
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
                                    <label>Tên chương trình khuyến mãi</label>
                                    <input id="SaleName" name="SaleName" type="text" class="form-control" placeholder="Vui lòng nhập tên" data-errors="Please Enter Name." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <div class="col-md-6">                      
                                <div class="form-group">
                                    <label>Thời gian bắt đầu</label>
                                    <input type='text' name="SaleStart" id='SaleStart' placeholder="Nhập thời gian bắt đầu" class="form-control" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Thời gian kết thúc</label>
                                    <input type='text' name="SaleEnd" id='SaleEnd' placeholder="Nhập thời gian kết thúc" class="form-control" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">                                    
                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input id="Percent" name="Percent" type="number" min="1" max="100" class="form-control" placeholder="% Giảm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">                                    
                                <label>Sản phẩm</label>
                                <div class="row form-group list-product">
                                    <a href="#" class="col-md-2 btn add-btn shadow-none d-none d-md-block" style="padding:15px;" data-toggle="modal" data-target="#select-products">
                                        <div class="add-product">
                                            <i class="las la-plus mr-2" style="font-size:24px;"></i>
                                            <br><span>Thêm Sản Phẩm</span>
                                        </div>    
                                    </a>
                                </div>
                            </div>
                        </div>                            
                        <input type="submit" class="btn btn-primary mr-2" value="Thêm khuyến mãi" data-toggle="modal" data-target=".bd-example-modal-sm">
                        <a href="{{URL::to('/manage-sale')}}" class="btn btn-light">Trở về</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

<div class="modal fade" id="select-products" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chọn sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row">
                @foreach($list_product as $key => $product)
                <div class="product-item col-md-3 select-pd" id="product-item-{{$product->idProduct}}" data-id="{{$product->idProduct}}">
                    <div class="product-image mb-3" id="product-image-{{$product->idProduct}}">

                        <?php $image = json_decode($product->ImageName)[0];?>
                        <label for="chk-pd-{{$product->idProduct}}"><img src="{{asset('public/storage/kidoldash/images/product/'.$image)}}" class="rounded w-100 img-fluid"/></label>

                        <div class="product-title">
                            <div class="product-name">
                                <input type="checkbox" class="checkstatus d-none" id="chk-pd-{{$product->idProduct}}" name="chk_product[]" value="{{$product->idProduct}}" data-id="{{$product->idProduct}}" data-name="{{$product->ProductName}}" data-price="{{$product->Price}}" data-img="{{$image}}">
                                <span>{{$product->ProductName}}</span>
                            </div>
                            <div style="text-align:center;">{{number_format($product->Price,0,',','.').' '.'đ'}}</div>
                        </div>
                    </div>
                    <input type="hidden" name="selected_product[]" id="product-{{$product->idProduct}}" value="" />
                </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" id="confirm" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
            </div>
        </div>
    </div>
</div>
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

<!-- JS Modal chọn sản phẩm sale -->
<script>
    $(document).ready(function(){  
        $("input[type=checkbox]").on("click", function() {
            var product_id = $(this).data("id");
            var product_name = $(this).data("name");
            var product_price = $(this).data("price");
            var product_img = $(this).data("img");

            if($(this).is(":checked")){
                $("#product-image-"+product_id).css("border","#ff7a6a 3px solid");
                $("#product-"+product_id).val(product_id);
                $(document).ready(function(){
                    $("#confirm").click(function(){
                        if($(".list-product > #product-list-item-"+product_id).length < 1)
                        $(".list-product").append('<div class="product-item col-md-2" id=product-list-item-'+ product_id +'><div class="product-image" id=product-list-image-'+ product_id +'><img src="public/storage/kidoldash/images/product/'+ product_img +'" class="rounded w-100 img-fluid"><div class="product-title"><div class="product-name"><span>'+product_name+'</span></div></div></div></div>');
                    })
                })
            }
            else if($(this).is(":not(:checked)")){
                $("#product-image-"+product_id).css("border","none");
                $("#product-"+product_id).val("	");
                $(document).ready(function(){
                    $("#confirm").click(function(){
                        $(".list-product > #product-list-item-"+product_id).remove();
                    })
                })
            }
        });

        $("#confirm").click(function(){
            var $fields = $("#form-add-sale").find('input[name="chk_product[]"]:checked');
            if (!$fields.length) $(".add-product").css("height","162px");
            else $(".add-product").css("height","100%");
        });

        $('#form-add-sale').submit(function() {
            var $fields = $(this).find('input[name="chk_product[]"]:checked');
            if (!$fields.length) {
                $(".alert-pd").append('<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"  aria-hidden="true"><div class="modal-dialog modal-dialog-centered modal-sm"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Thông báo</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><p>Chưa thêm sản phẩm khuyến mãi.</p></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button></div></div></div></div>');
                return false; // The form will *not* submit
            }
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

