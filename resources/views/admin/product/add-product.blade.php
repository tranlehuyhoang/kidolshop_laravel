@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<form action="{{URL::to('/submit-add-product')}}" method="POST" id="form-add-product" data-toggle="validator" enctype="multipart/form-data">
@csrf
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Thêm sản phẩm</h4>
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
                                    <label for="ProductName">Tên sản phẩm *</label>
                                    <input id="ProductName" name="ProductName" onkeyup="ChangeToSlug()" type="text" class="form-control slug" placeholder="Vui lòng nhập tên" data-errors="Please Enter Name." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>  
                            <input type="hidden" name="ProductSlug" class="form-control" id="convert_slug">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idCategory">Danh mục *</label>
                                    <select id="idCategory" name="idCategory" class="selectpicker form-control" data-style="py-0" required>
                                        <option value="">Chọn danh mục sản phẩm</option>
                                        @foreach($list_category as $key => $category)
                                        <option value="{{$category->idCategory}}">{{$category->CategoryName}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div> 
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idBrand">Thương hiệu *</label>
                                    <select id="idBrand" name="idBrand" class="selectpicker form-control" data-style="py-0" required>
                                        <option value="">Chọn thương hiệu sản phẩm</option>
                                        @foreach($list_brand as $key => $brand)
                                        <option value="{{$brand->idBrand}}">{{$brand->BrandName}}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="idBrand">Phân loại hàng</label>
                                    <button class="btn btn-primary d-block col-md-12" type="button" data-toggle="modal" data-target="#modal-attributes">Chọn phân loại</button>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex flex-wrap input-attrs">
                                <div class="col-md-12 d-flex flex-wrap attr-title">
                                    <div class="attr-title-1 col-md-6 text-center d-none"></div>
                                    <div class="attr-title-2 col-md-6 text-center d-none">Số lượng *</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Price">Giá *</label>
                                    <input id="Price" name="Price" type="number" min="0" class="form-control" placeholder="Vui lòng nhập giá" data-errors="Please Enter Price." required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">                                    
                                <div class="form-group">
                                    <label for="Quantity">Tổng số lượng *</label>
                                    <input id="Quantity" name="QuantityTotal" type="number" min="0" class="form-control" placeholder="Vui lòng nhập số lượng" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Hình ảnh *</label>
                                    <input name="ImageName[]" id="images" type="file" onchange="loadPreview(this)" class="form-control  image-file" multiple required/>
                                    <div class="help-block with-errors"></div>
                                    <div class="text-danger alert-img"></div>
                                    <div class="d-flex flex-wrap" id="image-list"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả ngắn *</label>
                                    <textarea id="ShortDes" name="ShortDes" class="form-control" placeholder="Nhập mô tả ngắn" rows="3" required></textarea>
                                    <div class="text-danger alert-shortdespd"></div>
                                    <script>$(document).ready(function(){CKEDITOR.replace('ShortDes');});</script>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mô tả / Chi tiết sản phẩm *</label>
                                    <textarea id="DesProduct" name="DesProduct" class="form-control tinymce" placeholder="Nhập mô tả chi tiết" rows="4"></textarea>
                                    <div class="text-danger alert-despd"></div>
                                    <script>$(document).ready(function(){CKEDITOR.replace('DesProduct');});</script>
                                </div>
                            </div>
                        </div>                            
                        <input type="submit" class="btn btn-primary mr-2" id="btn-submit" value="Thêm sản phẩm">
                        <a href="{{URL::to('/manage-products')}}" class="btn btn-light">Trở về</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

<!-- Model phân loại hàng -->
<div class="modal fade" id="modal-attributes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup text-left">
                    <h4 class="mb-3">Thêm phân loại hàng</h4>
                    <div class="content create-workform bg-body">
                        <label class="mb-0">Nhóm phân loại</label>
                        <select name="idAttribute" id="attribute" class="selectpicker form-control choose-attr" data-style="py-0">
                            <option value="">Chọn nhóm phân loại</option>
                            @foreach($list_attribute as $key => $attribute)
                            <option id="attr-group-{{$attribute->idAttribute}}" data-attr-group-name="{{$attribute->AttributeName}}" value="{{$attribute->idAttribute}}">{{$attribute->AttributeName}}</option>
                            @endforeach
                        </select>

                        <div class="pb-3 d-flex flex-wrap" id="attribute_value">
                            
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                <div class="btn btn-light mr-4" data-dismiss="modal">Trở về</div>
                                <div class="btn btn-primary" id="confirm-attrs" data-dismiss="modal">Xác nhận</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<!-- Model thêm phân loại màu sắc
<div class="modal fade" id="modal-add-color" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup text-left">
                    <h4 class="mb-3">Thêm màu sắc</h4>
                    <div class="content create-workform bg-body">
                        <div class="pb-3">
                            <input type="text" id="color-input" class="form-control" placeholder="Nhập tên màu">
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                <div class="btn btn-light mr-4" data-dismiss="modal">Trở về</div>
                                <div class="btn btn-primary" id="confirm-attr-color" data-dismiss="modal">Xác nhận</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

Model thêm phân loại size
<div class="modal fade" id="modal-add-size" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup text-left">
                    <h4 class="mb-3">Thêm size</h4>
                    <div class="content create-workform bg-body">
                        <div class="pb-3">
                            <input type="text" id="size-input" class="form-control" placeholder="Nhập size">
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                <div class="btn btn-light mr-4" data-dismiss="modal">Trở về</div>
                                <div class="btn btn-primary" id="confirm-attr-size" data-dismiss="modal">Xác nhận</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- Validate ảnh -->
<script>
    function loadPreview(input){
        $('.image-item').remove();
        var data = $(input)[0].files; //this file data
        $.each(data, function(index, file){
            if(/(\.|\/)(gif|jpeg|png|jpg|svg)$/i.test(file.type) && file.size < 2000000 ){
                var fRead = new FileReader();
                fRead.onload = (function(file){
                    return function(e) {
                        var img = $('<img/>').addClass('img-fluid rounded avatar-100 mr-3 mt-2').attr('src', e.target.result); //create image thumb element
                        $("#image-list").append('<div id="image-item-'+index+'" class="image-item"></div>');
                        $('#image-item-'+index).append(img);
                        //    $('#image-item-'+index).append('<span id="dlt-item-'+index+'" class="dlt-item"><span class="dlt-icon">x</span></span>');
                    };
                })(file);
                fRead.readAsDataURL(file);
                $('.alert-img').html("");
                $('#btn-submit').removeClass('disabled-button');
            }else{
                document.querySelector('#images').value = '';
                $('.alert-img').html("Tệp hình ảnh phải có định dạng .gif, .jpeg, .png, .jpg, .svg dưới 2MB");
                //    $('#btn-submit').addClass('disabled-button');
            }
        });
    }
</script>

<!-- Validate ckeditor -->
<script>
    $(document).ready(function(){  
        CKEDITOR.instances['DesProduct'].on('change', function () {
            var messageLength = CKEDITOR.instances['DesProduct'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                $('.alert-despd').html("Vui lòng điền vào trường này.");
                $('#btn-submit').addClass('disabled-button');
                
            }else{
                $('.alert-despd').html("");
                $('#btn-submit').removeClass('disabled-button');
            }
        });

        CKEDITOR.instances['ShortDes'].on('change', function () {
            var messageLength = CKEDITOR.instances['ShortDes'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                $('.alert-shortdespd').html("Vui lòng điền vào trường này.");
                $('#btn-submit').addClass('disabled-button');
                
            }else{
                $('.alert-shortdespd').html("");
                $('#btn-submit').removeClass('disabled-button');
            }
        });

        $("#form-add-product").submit( function(e) {
            var messageLength = CKEDITOR.instances['DesProduct'].getData().replace(/<[^>]*>/gi, '').length;
            var messageLength2 = CKEDITOR.instances['ShortDes'].getData().replace(/<[^>]*>/gi, '').length;

            if(!messageLength){
                $('.alert-despd').html("Vui lòng điền vào trường này.");
                e.preventDefault();
            }
            if(!messageLength2){
                $('.alert-shortdespd').html("Vui lòng điền vào trường này.");
                e.preventDefault();
            }
        });
    });
</script>

<!-- Validate phân loại hàng -->
<script>
    // $(document).ready(function(){  
    //     var i = 2;
    //     var j = 3;

        // $( "#confirm-attr-color" ).on( "click", function() {
        //     i++;
        //     var color_input = $('#color-input').val();
        //     var label_chk_color = $('<label for="chk-color-'+ i +'" class="d-block col-lg-2 p-0 m-0"><div id="color-name-'+ i +'" class="select-attr text-center mr-2 mt-2">'+ color_input +'</div></label>');
        //     var input_chk_color = $('<input type="checkbox" class="checkstatus d-none" id="chk-color-'+ i +'" data-id-color="'+ i +'" name="chk_color[]" value="'+ color_input +'">');
        //     label_chk_color.insertBefore('#btn-add-color');
        //     input_chk_color.insertBefore('#btn-add-color');

        //     $(input_chk_color).on("click", function() {
        //         var color_id = $(this).data("id-color");
        //         var color_name = $(this).val();

        //         if($(this).is(":checked")){
        //             $("#color-name-" +color_id).addClass("border-primary text-primary");
        //             $("#confirm-attrs").click(function(){
                        // var input_attrs_item = '<div id="input-attrs-item-'+ color_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ color_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ color_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
                        // if($('#input-attrs-item-' +color_id).length < 1) $('.input-attrs').append(input_attrs_item);
                        
                        // $(".qty-attr").on("input",function() {
                        //     var total_qty = 0;
                        //     $(".qty-attr").each(function(){
                        //         if(!isNaN(parseInt($(this).val())))
                        //         {
                        //             total_qty += parseInt($(this).val());  
                        //         }
                        //     });
                        //     $("#Quantity").val(total_qty);
                        // });
        //             });
        //         }
        //         else if($(this).is(":not(:checked)")){
                    // $("#color-name-" +color_id).removeClass("border-primary text-primary");
                    // $("#confirm-attrs").click(function(){
                    //     $('#input-attrs-item-' +color_id).remove();
                    // });
        //         }
        //     });
        // });

    //     $( "#confirm-attr-size" ).on( "click", function() {
    //         j++;
    //         var size_input = $('#size-input').val();
    //         var label_chk_size = $('<label for="chk-size-'+ j +'" class="d-block col-lg-2 p-0 m-0"><div id="size-name-'+ j +'" class="select-attr text-center mr-2 mt-2">'+ size_input +'</div></label>');
    //         var input_chk_size = $('<input type="checkbox" class="checkstatus d-none" id="chk-size-'+ j +'" data-id-size="'+ j +'" name="chk_size[]" value="'+ size_input +'">');
    //         label_chk_size.insertBefore('#btn-add-size');
    //         input_chk_size.insertBefore('#btn-add-size');

    //         $(input_chk_size).on("click", function() {
    //             var size_id = $(this).data("id-size");
    //             var size_name = $(this).val();

    //             if($(this).is(":checked")){
    //                 $("#size-name-" +size_id).addClass("border-primary text-primary");
    //                 $("#confirm-attrs").click(function(){
    //                     var input_attrs_item = '<div id="input-attrs-item-'+ size_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ size_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ size_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
    //                     if($('#input-attrs-item-' +size_id).length < 1) $('.input-attrs').append(input_attrs_item);
                        
    //                     $(".qty-attr").on("input",function() {
    //                         var total_qty = 0;
    //                         $(".qty-attr").each(function(){
    //                             if(!isNaN(parseInt($(this).val())))
    //                             {
    //                                 total_qty += parseInt($(this).val());  
    //                             }
    //                         });
    //                         $("#Quantity").val(total_qty);
    //                     });
    //                 });
    //             }
    //             else if($(this).is(":not(:checked)")){
    //                 $("#size-name-" +size_id).removeClass("border-primary text-primary");
    //                 $("#confirm-attrs").click(function(){
    //                     $('#input-attrs-item-' +size_id).remove();
    //                 });
    //             }
    //         });
    //     });

    //     $("input[type=checkbox]").on("click", function() {
    //         var color_id = $(this).data("id-color");
    //         var color_name = $(this).val();
    //         var size_id = $(this).data("id-size");
    //         var size_name = $(this).val();

    //     var check_color = function () {
    //         $('.chk_color').each(function (index1, obj1) {
    //             var color_id = $(this).data("id-color");
    //             var color_name = $(this).val();
    //             if (this.checked === true) 
    //             {
    //                 $("#color-name-" +color_id).addClass("border-primary text-primary");
    //                 var input_attrs_item_color = '<div id="input-attrs-item-color-'+ color_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ color_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ color_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
                   
    //                 $("#confirm-attrs").click(function(){
    //                     if($('#input-attrs-item-color-' +color_id).length < 1) $('.input-attrs').append(input_attrs_item_color);
    //                 });

    //                 $(".qty-attr").on("input",function() {
    //                     var total_qty = 0;
    //                     $(".qty-attr").each(function(){
    //                         if(!isNaN(parseInt($(this).val())))
    //                         {
    //                             total_qty += parseInt($(this).val());  
    //                         }
    //                     });
    //                     $("#Quantity").val(total_qty);
    //                 });
    //             }else
    //             {
    //                 $("#color-name-" +color_id).removeClass("border-primary text-primary");
    //                 $("#confirm-attrs").click(function(){
    //                     $('#input-attrs-item-color-' +color_id).remove();
    //                 });
    //             }
    //         });
    //     };
    //     $(".chk_color").on("change", check_color);
    //     check_color();

    //     var check_size = function () {
    //         $('.chk_size').each(function (index, obj) {
    //             var size_id = $(this).data("id-size");
    //             var size_name = $(this).val();
    //             if (this.checked === true) 
    //             {
    //                 $("#size-name-" +size_id).addClass("border-primary text-primary");
    //                 var input_attrs_item_size = '<div id="input-attrs-item-size-'+ size_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ size_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ size_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
                   
    //                 $("#confirm-attrs").click(function(){
    //                     if($('#input-attrs-item-size-' +size_id).length < 1) $('.input-attrs').append(input_attrs_item_size);
    //                 });

    //                 $(".qty-attr").on("input",function() {
    //                     var total_qty = 0;
    //                     $(".qty-attr").each(function(){
    //                         if(!isNaN(parseInt($(this).val())))
    //                         {
    //                             total_qty += parseInt($(this).val());  
    //                         }
    //                     });
    //                     $("#Quantity").val(total_qty);
    //                 });
    //             }else
    //             {
    //                 $("#size-name-" +size_id).removeClass("border-primary text-primary");
    //                 $("#confirm-attrs").click(function(){
    //                     $('#input-attrs-item-size-' +size_id).remove();
    //                 });
    //             }
    //         });
    //     };
    //     $(".chk_size").on("change", check_size);
    //     check_size();

    //         if($(this).is(":checked")){
    //             $("#color-name-" +color_id).addClass("border-primary text-primary");
    //             $("#size-name-" +size_id).addClass("border-primary text-primary");

    //             $("#confirm-attrs").click(function(){
    //                 var color_length = $('[name="chk_color[]"]:checked').length;
    //                 var size_length = $('[name="chk_size[]"]:checked').length;

    //                 if(color_length >= 1 && size_length >= 1)
    //                 {
    //                     $('.attr-title-1').removeClass('d-none');
    //                     $('.attr-title-2').removeClass('d-none');

    //                     // for(var k=0; k< color_length; k++){
    //                         var input_attrs_item1 = '<div id="input-attrs-item-color-'+ color_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ color_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ color_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
    //                         $('.input-attrs').append(input_attrs_item1);

    //                         var input_attrs_item2 = '<div id="input-attrs-item-size-'+ size_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ size_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ size_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
    //                          $('.input-attrs').append(input_attrs_item2);
    //                     // }
    //                 }else if(color_length >= 1 || size_length >= 1)
    //                 {
    //                     $('.attr-title-1').removeClass('d-none');
    //                     $('.attr-title-2').removeClass('d-none');

    //                     if(color_length >= 1)
    //                     {
    //                         var input_attrs_item = '<div id="input-attrs-item-color-'+ color_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ color_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ color_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
    //                         if($('#input-attrs-item-color-' +color_id).length < 1) $('.input-attrs').append(input_attrs_item);
                            
    //                         $(".qty-attr").on("input",function() {
    //                             var total_qty = 0;
    //                             $(".qty-attr").each(function(){
    //                                 if(!isNaN(parseInt($(this).val())))
    //                                 {
    //                                     total_qty += parseInt($(this).val());  
    //                                 }
    //                             });
    //                             $("#Quantity").val(total_qty);
    //                         });
    //                     }else if(size_length >= 1)
    //                     {
    //                         var input_attrs_item = '<div id="input-attrs-item-size-'+ size_id +'" class="col-md-12 d-flex flex-wrap"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ size_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ size_id +'" class="form-control text-center qty-attr" name="qty_attr[]" type="number" required></div></div>';
    //                         if($('#input-attrs-item-size-' +size_id).length < 1) $('.input-attrs').append(input_attrs_item);
                            
    //                         $(".qty-attr").on("input",function() {
    //                             var total_qty = 0;
    //                             $(".qty-attr").each(function(){
    //                                 if(!isNaN(parseInt($(this).val())))
    //                                 {
    //                                     total_qty += parseInt($(this).val());  
    //                                 }
    //                             });
    //                             $("#Quantity").val(total_qty);
    //                         });
    //                     }
    //                 }else
    //                 {
    //                     $('.attr-title-1').addClass('d-none');
    //                     $('.attr-title-2').addClass('d-none');
    //                 }
    //             });
    //         }
    //         else if($(this).is(":not(:checked)")){      
    //             $("#color-name-" +color_id).removeClass("border-primary text-primary");
    //             $("#size-name-" +size_id).removeClass("border-primary text-primary");

    //             $("#confirm-attrs").click(function(){
    //                 $('#input-attrs-item-' +color_id).remove();
    //                 $('#input-attrs-item-' +size_id).remove();
    //             });
    //         }
    //     });

        // $("#confirm-attrs").click(function(){
        //     if($('[name="chk_color[]"]:checked').length >= 1 || $('[name="chk_size[]"]:checked').length >= 1){
        //         $('.attr-title-1').removeClass('d-none');
        //         $('.attr-title-2').removeClass('d-none');
        //     }else{
        //         $('.attr-title-1').addClass('d-none');
        //         $('.attr-title-2').addClass('d-none');
        //     }
        // });
    // });
</script>

<!-- Validate phân loại hàng -->
<script>
    $(document).ready(function(){  
        $('.choose-attr').on('change',function(){
            var action = $(this).attr('id');
            var idAttribute = $(this).val();
            var attr_group_name = $("#attr-group-"+idAttribute).data("attr-group-name");
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action == 'attribute')   result = 'attribute_value';
            $.ajax({
                url: '{{url("/select-attribute")}}',
                method: 'POST',
                data: {action:action, idAttribute:idAttribute, _token:_token},
                success:function(data){
                    $('#'+result).html(data);

                    $("input[type=checkbox]").on("click", function() {
                        var attr_id = $(this).data("id");
                        var attr_name = $(this).data("name");

                        if($(this).is(":checked")){
                            $("#attr-name-"+attr_id).addClass("border-primary text-primary");

                            $("#confirm-attrs").click(function(){
                                var input_attrs_item = '<div id="input-attrs-item-'+ attr_id +'" class="col-md-12 d-flex flex-wrap input_attrs_items"><div class="col-md-6"><input class="form-control text-center" type="text" value="'+ attr_name +'" disabled></div><div class="form-group col-md-6"><input id="qty-attr-'+ attr_id +'" class="form-control text-center qty-attr" name="qty_attr[]" placeholder="Nhập số lượng phân loại" type="number" min="0" required></div></div>';
                                if($('#input-attrs-item-' +attr_id).length < 1) $('.input-attrs').append(input_attrs_item);
                                
                                $(".qty-attr").on("input",function() {
                                    var total_qty = 0;
                                    $(".qty-attr").each(function(){
                                        if(!isNaN(parseInt($(this).val())))
                                        {
                                            total_qty += parseInt($(this).val());  
                                        }
                                    });
                                    $("#Quantity").val(total_qty);
                                });

                                $("#qty-attr-"+ attr_id).on("change",function() {
                                    if($(this).val() == "" || $(this).val() < 0){
                                        $(this).css("border","1px solid #E08DB4");
                                        $('#btn-submit').addClass('disabled-button');
                                    }else{
                                        $(this).css("border","1px solid #DCDFE8");
                                        $('#btn-submit').removeClass('disabled-button');
                                    }
                                });

                                $("#form-add-product").submit( function(e) {
                                    var val_input = $('#qty-attr-'+attr_id).val();
                                    if(val_input == "" || val_input < 0){
                                        e.preventDefault();
                                        $('#qty-attr-'+attr_id).css("border","1px solid #E08DB4");
                                    }
                                });
                            });
                        }
                        else if($(this).is(":not(:checked)")){
                            $("#attr-name-"+attr_id).removeClass("border-primary text-primary");
                            
                            $("#confirm-attrs").click(function(){
                                $('#input-attrs-item-' +attr_id).remove();

                                // Số lượng input
                                var total_qty = 0;
                                $(".qty-attr").each(function(){
                                    if(!isNaN(parseInt($(this).val())))
                                    {
                                        total_qty += parseInt($(this).val());  
                                    }
                                });
                                $("#Quantity").val(total_qty);
                            });
                        }

                        $('.choose-attr').on('change',function(){
                            $('.chk_attr').prop('checked', false);

                            $("#confirm-attrs").click(function(){
                                $('.input_attrs_items').remove();
                            });
                        });
                    });

                    $("#confirm-attrs").click(function(){
                        if($('[name="chk_attr[]"]:checked').length >= 1){
                            $('.attr-title-1').html(attr_group_name);
                            $('.attr-title-1').removeClass('d-none');
                            $('.attr-title-2').removeClass('d-none');
                            $('#Quantity').addClass('disabled-input');
                        }else{
                            $('.attr-title-1').addClass('d-none');
                            $('.attr-title-2').addClass('d-none');
                            $('#Quantity').removeClass('disabled-input');
                        }
                    });
                }
            });
        });
    });
</script>

@endsection