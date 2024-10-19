@extends('shop_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(public/kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Tài khoản của tôi</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tài khoản của tôi</li>
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
                            <a class="active"><i class="fa fa-user"></i> Hồ Sơ</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/change-password')}}"><i class="fa fa-key"></i> Đổi Mật Khẩu</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/ordered')}}"><i class="fa fa-shopping-cart"></i> Đơn Đặt Hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <div class="tab-content my-account-tab mt-30" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-account">
                        <div class="tab-content my-account-tab" id="pills-tabContent">
                            <div class="tab-pane fade active show">
                                <div class="my-account-address account-wrapper">
                                    <div class="row">
                                        <div class="col-md-12" style="border-bottom: solid 1px #efefef;">
                                            <h4 class="account-title" style="margin-bottom: 0;">Hồ Sơ Của Tôi</h4>
                                            <h5 style="color: #666;">Quản lý thông tin hồ sơ để bảo mật tài khoản</h5>
                                        </div>
                                        <form id="form-edit-profile" style="display:flex; padding: 0;" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-8 mt-10">
                                                <div class="account-address">
                                                    <div class="profile__info-body-left-item">
                                                        <span class="profile__info-body-left-item-title">Tên Đăng Nhập</span>
                                                        <span class="profile__info-body-left-item-text ml-20">{{$customer->username}}</span>
                                                    </div>
                                                    <div class="form-group mb-30">
                                                        <span for="CustomerName" class="profile__info-body-left-item-title" style="margin: 0 28px 0 52px;">Họ Và Tên</span>
                                                        <input id="CustomerName" name="CustomerName" class="ml-30" style="width:65%;" type="text" value="{{$customer->CustomerName}}">
                                                    </div>
                                                    <div class="form-group mb-30">
                                                        <span class="profile__info-body-left-item-title" style="margin-left: 52px;">Số Điện Thoại</span>
                                                        <input class="ml-30" style="width:65%;" name="PhoneNumber" id="PhoneNumber" type="text" value="{{$customer->PhoneNumber}}">
                                                    </div>
                                                    <button class="btn btn-primary edit-profile" style="float: right;"><i class="fa fa-edit"></i> Sửa Hồ Sơ</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mt-10 d-flex align-items-center justify-content-center" style="border-left: solid 1px #efefef; margin: 0 12px;">
                                                <div class="profile__info-body-right-avatar">
                                                    <div class="profile-img-edit">
                                                        <div class="crm-profile-img-edit">
                                                            @if($customer->Avatar != null)
                                                            <img class="crm-profile-pic rounded-circle avatar-100 replace-avt" src="public/storage/kidoldash/images/customer/{{$customer->Avatar}}">
                                                            @else <img class="crm-profile-pic rounded-circle avatar-100 replace-avt" src="public/kidoldash/images/user/1.png"> @endif
                                                            <div class="crm-p-image bg-primary">
                                                                <label for="Avatar" style="cursor:pointer;"><span class="ti-pencil upload-button d-block"></span></label>
                                                                <input type="file" class="file-upload" id="Avatar" name="Avatar" onchange="loadPreview(this)" accept="image/*">
                                                            </div>
                                                        </div>                                          
                                                    </div>
                                                    <div class="text-danger alert-img mt-3 ml-3 mr-3"></div>
                                                    <div class="mt-30">
                                                        <span class="profile__info-body-right-avatar-condition-item">Dung lượng file tối đa 2MB</span>
                                                        <span class="profile__info-body-right-avatar-condition-item">Định dạng: .JPEG, .PNG</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--My Account End-->

<script src="{{asset('public/kidolshop/js/jquery.validate.min.js')}}"></script>

<script>
    window.scrollBy(0,300);

    $(document).ready(function(){  
        $('.edit-profile').on('click',function(){
            $("#form-edit-profile").validate({
                rules: {
                    CustomerName: {
                        required: true,
                        minlength: 5
                    },
                    PhoneNumber: {
                        required: true,
                        minlength: 10,
                        maxlength: 12
                    }
                },

                messages: {
                    CustomerName: {
                        required: "Vui lòng nhập trường này",
                        minlength: "Nhập họ và tên tối thiểu 5 ký tự"
                    },
                    PhoneNumber: {
                        required: "Vui lòng nhập trường này",
                        minlength: "Nhập số điện thoại tối thiểu 10 chữ số",
                        maxlength: "Nhập số điện thoại tối đa 12 chữ số"
                    }
                },

                submitHandler: function(form) {
                    let formData = new FormData($('#form-edit-profile')[0]);
                    if($('input[type=file]')[0].files[0]){
                        let file = $('input[type=file]')[0].files[0];
                        formData.append('file', file, file.name);
                    }

                    $.ajax({
                        url: APP_URL + '/edit-profile',
                        type: 'POST',   
                        contentType: false,
                        processData: false,   
                        cache: false,        
                        data: formData,
                        success:function(data){
                            location.reload();
                        }
                    });
                }
            });
        });
    });

    function loadPreview(input){
        var data = $(input)[0].files; //this file data
        $.each(data, function(index, file){
            if(/(\.|\/)(gif|jpeg|png|jpg|svg)$/i.test(file.type) && file.size < 2000000 ){
                var fRead = new FileReader();
                fRead.onload = (function(file){
                    return function(e) {
                        $('.replace-avt').attr('src', e.target.result);
                    };
                })(file);
                fRead.readAsDataURL(file);
                $('.alert-img').html($('#Avatar').val().replace(/^.*[\\\/]/, ''));
            }else{
                document.querySelector('#Avatar').value = '';
                $('.alert-img').html("Tệp hình ảnh phải có định dạng .gif, .jpeg, .png, .jpg, .svg dưới 2MB");
            }
        });
    }
</script>

@endsection