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
                            <h4 class="card-title">Thêm Phân Loại</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{URL::to('/submit-add-attr-value')}}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row"> 
                                <?php
                                    $message = Session::get('message');
                                    $error = Session::get('error');
                                    if($message){
                                        echo '<span class="text-success ml-3">'.$message.'</span>';
                                        Session::put('message', null);
                                    }else if($error){
                                        echo '<span class="text-danger ml-3">'.$error.'</span>';
                                        Session::put('error', null);
                                    }
                                ?>       
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="idAttribute">Nhóm phân loại *</label>
                                        <select id="idAttribute" name="idAttribute" class="selectpicker form-control" data-style="py-0" required>
                                            <option value="">Chọn nhóm phân loại</option>
                                            @foreach($list_attribute as $key => $attribute)
                                            <option value="{{$attribute->idAttribute}}">{{$attribute->AttributeName}}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>        
                                <div class="col-md-12">         
                                    <div class="form-group">
                                        <label>Tên phân loại</label>
                                        <input type="text" name="AttrValName" class="form-control" placeholder="Nhập tên phân loại" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>    
                            </div>                             
                            <input type="submit" class="btn btn-primary mr-2" value="Thêm phân loại">
                            <a href="{{URL::to('/manage-attr-value')}}" class="btn btn-light mr-2">Trở Về</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->


@endsection