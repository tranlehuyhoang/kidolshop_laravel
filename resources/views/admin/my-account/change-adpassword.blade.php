@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="iq-edit-list usr-edit">
                            <ul class="iq-edit-profile d-flex nav nav-pills">
                                <li class="col-md-12 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#chang-pwd">
                                    Đổi Mật Khẩu
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                        <?php
                            $message = Session::get('message');
                            $error = Session::get('error');
                            if($message){
                                echo '<span class="text-success">'.$message.'</span>';
                                Session::put('message', null);
                            }else if($error){
                                echo '<span class="text-danger">'.$error.'</span>';
                                Session::put('error', null);
                            }
                        ?>    
                        <div class="tab-pane fade active show" id="chang-pwd" role="tabpanel">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Đổi Mật Khẩu</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{URL::to('/submit-change-adpassword')}}" id="form-changepassword">
                                        @csrf
                                        <div class="form-group">
                                        <label for="cpass">Mật Khẩu Cũ:</label>
                                        <!-- <a href="javascripe:void();" class="float-right">Forgot Password</a> -->
                                        <input type="Password" name="password" class="form-control" id="cpass" value="">
                                        <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                        <label for="npass">Mật Khẩu Mới:</label>
                                        <input type="Password" name="newpassword" class="form-control" id="npass" value="">
                                        <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                        <label for="vpass">Nhập Lại Mật Khẩu:</label>
                                        <input type="Password" name="renewpassword" class="form-control" id="vpass" value="">
                                        <span class="text-danger"></span>
                                        </div>
                                        <input type="submit" class="btn btn-primary mr-2" value="Lưu"/>
                                        <!-- <button type="reset" class="btn iq-bg-danger">Cancel</button> -->
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

<script>
    $(document).ready(function(){  
        Validator({
            form: "#form-changepassword",
            errorSelector: ".text-danger",
            parentSelector: ".form-group",
            rules:[
            Validator.isRequired("#cpass"),
            Validator.isRequired("#npass"),
            Validator.isRequired("#vpass"),  
            Validator.isPassword("#npass"),
            Validator.isRePassword("#vpass",function(){
                return  document.querySelector("#form-changepassword #npass").value;
            })
            ]
        });
    });
</script>


@endsection