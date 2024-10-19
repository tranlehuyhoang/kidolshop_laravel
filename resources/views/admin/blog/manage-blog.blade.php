@extends('admin_layout')
@section('content_dash')

<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh Sách Tin Tức ( Tổng: {{$count_blog}} tin tức )</h4>
                        <p class="mb-0">Trang hiển thị danh sách nhân viên, cung cấp cho bạn thông tin về nhân viên và chức vụ của nhân viên, các chức năng và điều khiển. </p>
                    </div>
                    <a href="{{URL::to('/add-blog')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Thêm tin tức</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-tables table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>ID Tin tức</th>
                                <th>Tiêu đề</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Ẩn/Hiện</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody class="ligth-body">
                            @foreach($list_blog as $key => $blog)
                            <tr>
                                <td>{{$blog->idBlog}}</td>
                                <td>
                                    <img src="{{asset('public/storage/kidoldash/images/blog/'.$blog->BlogImage)}}" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                    {{$blog->BlogTitle}}
                                </td>
                                <td>{{$blog->created_at}}</td>
                                <td>{{$blog->updated_at}}</td>
                                <td>
                                    @if($blog->Status == 0) Ẩn
                                    @else Hiện 
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sửa"
                                            href="{{URL::to('/edit-blog/'.$blog->idBlog)}}"><i class="ri-pencil-line mr-0"></i></a>
                                        
                                        <a class="badge bg-warning mr-2" data-toggle="modal" data-target="#modal-delete-{{$blog->idBlog}}" data-placement="top" title="" data-original-title="Xóa"
                                            style="cursor:pointer;"><i class="ri-delete-bin-line mr-0"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="modal-delete-{{$blog->idBlog}}"  aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông báo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Bạn có muốn xóa tin tức {{$blog->BlogTitle}} không?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Trở về</button>
                                            <a href="{{URL::to('/delete-blog/'.$blog->idBlog)}}" type="button" class="btn btn-primary">Xác nhận</a>
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
      
@endsection