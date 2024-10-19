@extends('shop_layout')
@section('content')

<?php use Illuminate\Support\Facades\Session; ?>

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(public/kidolshop/images/oso.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Đăng Nhập</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang Chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Đăng Nhập</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Login Start-->
<div class="login-page section-padding-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="login-register-content">
                    <h4 class="title">Đăng Nhập Tài Khoản</h4>

                    <div class="login-register-form">
                        <form method="POST" action="{{URL::to('/submit-login')}}" id="form-login">
                            @csrf
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-danger">'.$message.'</span>';
                                    Session::put('message', null);
                                }
                                ?>
                            <div class="form-group mt-15">
                                <label for="username">Tên tài khoản</label>
                                <input id="username" type="text" name="username">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group mt-15">
                                <label for="passsword">Mật khẩu</label>
                                <input id="password" type="password" name="password">
                                <span class="text-danger"></span>
                            </div>
                            <div class="form-group mt-15">
                                <input type="submit" class="btn btn-primary btn-block" value="Đăng nhập"/>
                            </div>
                            <div class="form-group mt-15">
                                <label>Bạn chưa có tài khoản?</label>
                                <a href="{{URL::to('/register')}}" class="btn btn-dark btn-block">Đăng ký ngay</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Login End-->

<!-- Validate form đăng nhập -->
<script>
    $(document).ready(function(){  
        Validator({
            form: "#form-login",
            errorSelector: ".text-danger",
            parentSelector: ".form-group",
            rules:[
            Validator.isRequired("#username"),
            Validator.isRequired("#password")
            ]
        });
    });
</script>

@endsection