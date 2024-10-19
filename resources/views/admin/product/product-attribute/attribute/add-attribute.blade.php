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
                            <h4 class="card-title">Thêm Nhóm Phân Loại</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('/submit-add-attribute')}}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row"> 
                                <div class="col-md-12">
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
                                    <div class="form-group">
                                        <label>Tên nhóm phân loại</label>
                                        <input type="text" name="AttributeName" class="form-control" placeholder="Nhập tên nhóm phân loại" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>    
                            </div>                             
                            <input type="submit" class="btn btn-primary mr-2" value="Thêm nhóm phân loại">
                            <a href="{{URL::to('/manage-attribute')}}" class="btn btn-light mr-2">Trở Về</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->


@endsection