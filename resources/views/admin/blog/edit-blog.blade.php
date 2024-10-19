@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Sửa tin tức</h4>
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
                        <form  method="post" action="{{URL::to('/submit-edit-blog/'.$blog->idBlog)}}" id="form-add-blog" data-toggle="validator" enctype="multipart/form-data">
                            @csrf
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tiêu đề *</label>
                                        <input type="text" name="BlogTitle" value="{{$blog->BlogTitle}}" class="form-control slug" onkeyup="ChangeToSlug()" placeholder="Nhập tiêu đề tin tức" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <input type="hidden" name="BlogSlug" value="{{$blog->BlogSlug}}" class="form-control" id="convert_slug">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ảnh tin tức *</label>
                                        <input type="file" name="BlogImage" id="images" onchange="loadPreview(this)" class="form-control image-file">
                                        <div class="text-danger alert-img"></div>
                                        <div class="d-flex flex-wrap" id="image-list">
                                            <div id="image-item-0" class="image-item">
                                                <img src="{{asset('public/storage/kidoldash/images/blog/'.$blog->BlogImage)}}" class="img-fluid rounded avatar-100 mr-3 mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô tả ngắn *</label>
                                        <textarea class="form-control" name="BlogDesc">{{$blog->BlogDesc}}</textarea>
                                        <script>$(document).ready(function(){CKEDITOR.replace('BlogDesc');});</script>
                                        <div class="text-danger alert-desblog"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nội dung *</label>
                                        <textarea class="form-control" name="BlogContent">{{$blog->BlogContent}}</textarea>
                                        <script>$(document).ready(function(){CKEDITOR.replace('BlogContent');});</script>
                                        <div class="text-danger alert-contentblog"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Ẩn/Hiện *</label>
                                        <select class="selectpicker form-control" data-style="py-0" name="Status">
                                            <option value="{{$blog->Status}}">
                                                @if($blog->BlogStatus == 0) Ẩn
                                                @else Hiện
                                                @endif
                                            </option>
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary mr-2" id="btn-submit" value="Sửa tin tức">
                            <a href="{{URL::to('/manage-blog')}}" class="btn btn-light mr-2">Trở Về</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                    };
                })(file);
                fRead.readAsDataURL(file);
                $('.alert-img').html("");
                $('#btn-submit').removeClass('disabled-button');
            }else{
                document.querySelector('#images').value = '';
                $('.alert-img').html("Tệp hình ảnh phải có định dạng .gif, .jpeg, .png, .jpg, .svg dưới 2MB");
            }
        });
    }
</script>

<script>
    $(document).ready(function(){  
        CKEDITOR.instances['BlogContent'].on('change', function () {
            var messageLengthContent = CKEDITOR.instances['BlogContent'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLengthContent ) {
                $('.alert-contentblog').html("Vui lòng điền vào trường này.");
                $('#btn-submit').addClass('disabled-button');
                
            }else{
                $('.alert-contentblog').html("");
                $('#btn-submit').removeClass('disabled-button');
            }
        });

        CKEDITOR.instances['BlogDesc'].on('change', function () {
            var messageLengthDesc = CKEDITOR.instances['BlogDesc'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLengthDesc ) {
                $('.alert-desblog').html("Vui lòng điền vào trường này.");
                $('#btn-submit').addClass('disabled-button');
                
            }else{
                $('.alert-desblog').html("");
                $('#btn-submit').removeClass('disabled-button');
            }
        });
    });
</script>

@endsection
