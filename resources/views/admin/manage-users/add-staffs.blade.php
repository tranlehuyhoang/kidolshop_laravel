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
                            <h4 class="card-title">Thêm Nhân Viên</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{URL::to('/submit-add-staffs')}}" id="form-insert-users" data-toggle="validator">
                            @csrf
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
                            <div class="row"> 
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label for="AdminName">Họ Và Tên</label>
                                        <input id="AdminName" type="text" name="AdminName" class="form-control" placeholder="Nhập Họ Và Tên">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="NumberPhone">Số Điện Thoại</label>
                                        <input id="NumberPhone" type="text" name="NumberPhone" class="form-control" placeholder="Nhập Số Điện Thoại">
                                        <span class="text-danger"></span>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input id="Email" type="text" name="Email" class="form-control" placeholder="Nhập Email">
                                        <span class="text-danger"></span>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Address">Địa Chỉ</label>
                                        <input id="Address" type="text" name="Address" class="form-control" placeholder="Nhập Địa Chỉ">
                                        <span class="text-danger"></span>
                                    </div>
                                </div> 
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>  -->
                                <div class="col-md-12">                      
                                    <div class="form-group">
                                        <label for="AdminUser">Tên tài khoản</label>
                                        <input id="AdminUser" type="text" name="AdminUser" class="form-control" placeholder="Nhập Tài Khoản">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label for="AdminPass">Mật Khẩu</label>
                                        <input id="AdminPass" type="password" name="AdminPass" class="form-control" placeholder="Nhập Mật Khẩu">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>  
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label for="AdminRePass">Xác Nhận Mật Khẩu</label>
                                        <input id="AdminRePass" type="password" name="AdminRePass" class="form-control" placeholder="Xác Nhận Mật Khẩu">
                                        <span class="text-danger"></span>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Chức Vụ</label>
                                        <select name="Position" class="selectpicker form-control" data-style="py-0" required>
                                            <option value="">Chọn chức vụ</option>
                                            <option value="Quản Lý">Quản Lý</option>
                                            <option value="Nhân Viên">Nhân Viên</option>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="checkbox d-inline-block mb-3">
                                        <input type="checkbox" class="checkbox-input mr-2" id="checkbox1" checked="">
                                        <label for="checkbox1">Notify User by Email</label>
                                    </div>
                                </div>                                -->
                            </div>                            
                            <a href="{{URL::to('/manage-staffs')}}" class="btn btn-light mr-2">Trở Về</a>
                            <input id="insertadmin" type="submit" class="btn btn-primary mr-2" value="Thêm Người Dùng"/>
                            <!-- <button type="reset" class="btn btn-danger">Reset</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

<script>
    $(document).ready(function(){  
        Validator({
            form: "#form-insert-users",
            errorSelector: ".text-danger",
            parentSelector: ".form-group",
            rules:[
            Validator.isRequired("#AdminName"),
            Validator.isRequired("#AdminUser"),
            Validator.isRequired("#AdminPass"),  
            Validator.isRequired("#AdminRePass"),
            Validator.isRequired("#Address"), 
            Validator.isRequired("#Email"),
            Validator.isRequired("#NumberPhone"),
            Validator.isFullname('#AdminUser'),
            Validator.isEmail("#Email"),
            Validator.isPassword("#AdminPass"),
            Validator.isRePassword("#AdminRePass",function(){
                return  document.querySelector("#form-insert-users #AdminPass").value;
            }),
            Validator.isPhone("#NumberPhone")
            ]
        });
    });
</script>

@endsection
