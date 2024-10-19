@extends('admin_layout')
@section('content_dash')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Tài Khoản Khách Hàng ( Tổng: {{$count_customer}} khách hàng )</h4>
                        <p class="mb-0">Trang hiển thị danh sách tài khoản khách hàng, cung cấp thông tin về khách hàng, các chức năng và điều khiển. </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Avatar</th>
                                <th>Tên Tài Khoản</th>
                                <th>Họ Và Tên</th>
                                <th>Số Điện Thoại</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach($list_customer as $key => $customer)
                            <tr>
                                @if($customer->Avatar)
                                <td class="text-center"><img class="rounded img-fluid avatar-40"
                                        src="public/kidolshop/images/customer/{{$customer->Avatar}}" alt="profile"></td>
                                @else
                                <td class="text-center"><img class="rounded img-fluid avatar-40"
                                        src="public/kidolshop/images/customer/1.png" alt="profile"></td>
                                @endif
                                <td>{{$customer->username}}</td>
                                <td>{{$customer->CustomerName}}</td>
                                <td>{{$customer->PhoneNumber}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#modal-delete-{{$customer->idCustomer}}" data-placement="top" title="" data-original-title="Xoá"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-{{$customer->idCustomer}}"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có muốn xóa tài khoản khách hàng {{$customer->username}} không?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                            <a href="{{URL::to('/delete-customer/'.$customer->idCustomer)}}" type="button" class="btn btn-primary">Xác nhận</a>
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