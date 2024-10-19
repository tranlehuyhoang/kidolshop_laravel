@extends('admin_layout')
@section('content_dash')

<?php use Illuminate\Support\Facades\Session; ?>

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Nhân Viên ( Tổng: {{$count_staff}} nhân viên )</h4>
                        <p class="mb-0">Trang hiển thị danh sách nhân viên, cung cấp cho bạn thông tin về nhân viên và chức vụ của nhân viên, các chức năng và điều khiển. </p>
                    </div>
                    <a href="{{URL::to('/add-staffs')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm Nhân Viên</a>
                </div>
            </div>

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
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Avatar</th>
                                <th>Tên Tài Khoản</th>
                                <th>Họ và Tên</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Chức Vụ</th>
                                <th style="min-width: 100px">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($list_staff as $key => $staff)
                            <tr>
                                @if($staff->Avatar)
                                <td class="text-center"><img class="rounded img-fluid avatar-50"
                                        src="public/storage/kidoldash/images/user/{{$staff->Avatar}}" alt="profile"></td>
                                @else
                                <td class="text-center"><img class="rounded img-fluid avatar-50"
                                        src="public/kidoldash/images/user/12.jpg" alt="profile"></td>
                                @endif
                                <td>{{$staff->AdminUser}}</td>
                                <td>{{$staff->AdminName}}</td>
                                <td>{{$staff->Email}}</td>
                                <td>{{$staff->Address}}</td>
                                <td>{{$staff->NumberPhone}}</td>
                                <td>{{$staff->Position}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <!-- <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                            href="#"><i class="ri-eye-line mr-0"></i></a>
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                            href="#"><i class="ri-pencil-line mr-0"></i></a> -->
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#modal-delete-{{$staff->idAdmin}}" data-placement="top" title="" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-{{$staff->idAdmin}}"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có muốn xóa nhân viên {{$staff->AdminName}} không?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                            <a href="{{URL::to('/delete-staff/'.$staff->idAdmin)}}" type="button" class="btn btn-primary">Xác nhận</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end  -->

@endsection