@extends('admin_layout')
@section('content_dash')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Mã Giảm Giá ( Tổng: {{$count_voucher}} mã giảm giá )</h4>
                        <p class="mb-0">Danh sách các mã giảm giá hợp tác với cửa hàng<br>
                            Bảng điều khiên thực hiện chức năng.</p>
                    </div>
                    <a href="{{URL::to('/add-voucher')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm Mã Giảm Giá</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>Mã giảm giá</th>
                                <th>Tên mã giảm giá</th>
                                <th>Phần trăm/Số tiền</th>
                                <th>Số lượng</th>
                                <th>Bắt đầu</th>
                                <th>Kết thúc</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body" id="load-voucher">
                            @foreach($list_voucher as $key => $voucher)
                            <tr>
                                <td>{{$voucher->VoucherCode}}</td>
                                <td>{{$voucher->VoucherName}}</td>
                                @if($voucher->VoucherCondition == 1 ) <td>{{$voucher->VoucherNumber}}%</td>
                                @else <td>{{number_format($voucher->VoucherNumber,0,',','.')}}đ</td> @endif
                                <td>{{$voucher->VoucherQuantity}}</td>
                                <td>{{$voucher->VoucherStart}}</td>
                                <td>{{$voucher->VoucherEnd}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"
                                            href="{{URL::to('/edit-voucher/'.$voucher->idVoucher)}}"><i class="ri-pencil-line mr-0"></i></a>
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#model-delete-{{$voucher->idVoucher}}" data-placement="top" title="" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="model-delete-{{$voucher->idVoucher}}"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông báo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa mã giảm giá {{$voucher->VoucherName}} không?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                        <a href="{{URL::to('/delete-voucher/'.$voucher->idVoucher)}}" type="button" class="btn btn-primary">Xác nhận</a>
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