<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  use Illuminate\Support\Facades\Session;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Kidoldash</title>
      
      <!-- Morris Chart CSS -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('public/kidoldash/images/favicon.ico')}}" />
      <link rel="stylesheet" href="{{asset('public/kidoldash/css/backend-plugin.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/css/backend.css?v=1.0.0')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/vendor/remixicon/fonts/remixicon.css')}}">
    </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
      
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="{{URL::to('/dashboard')}}" class="header-logo">
                <img src="{{asset('public/kidoldash/images/logo.png')}}" class="img-fluid rounded-normal light-logo" alt="logo">
                  <h5 class="logo-title light-logo ml-2">KidolDash</h5>
              </a>
              <div class="iq-menu-bt-sidebar ml-0">
                  <i class="las la-bars wrapper-menu" style="cursor:pointer;"></i>
              </div>
          </div>

          <?php
            $position = Session::get('Position');
            $avatar = Session::get('Avatar');
            
            if($position != 'Nhân Viên'){
          ?>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                          <a href="{{URL::to('/dashboard')}}" class="svg-icon">                        
                              <svg  class="svg-icon" id="p-dash1" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                              </svg>
                              <span class="ml-4">Thống Kê Doanh Thu</span>
                          </a>
                      </li>
                      <li class=" ">
                          <a href="#purchase" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash5" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                  <line x1="1" y1="10" x2="23" y2="10"></line>
                              </svg>
                              <span class="ml-4">Quản Lý Đơn Hàng</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="purchase" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ Request::is('list-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/list-bill')}}">
                                        <i class="las la-minus"></i><span>Danh Sách Đơn Hàng</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('waiting-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/waiting-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Chờ Xác Nhận</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('shipping-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/shipping-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đang Giao</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('shipped-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/shipped-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đã Giao</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('cancelled-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/cancelled-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đã Hủy</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('confirmed-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/confirmed-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đã Xác Nhận</span>
                                    </a>
                                </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#product" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                  <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Sản Phẩm</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                              <li class="{{ Request::is('manage-products') ? 'active' : '' }}">
                                  <a href="{{URL::to('/manage-products')}}">
                                      <i class="las la-minus"></i><span>Danh Sách Sản Phẩm</span>
                                  </a>
                              </li>
                              <li class="{{ Request::is('add-product') ? 'active' : '' }}">
                                  <a href="{{URL::to('/add-product')}}">
                                      <i class="las la-minus"></i><span>Thêm Sản Phẩm</span>
                                  </a>
                              </li>
                              <li class="">
                                <a href="#attribute" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                    <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    <span class="ml-4">Quản Lý Phân Loại</span>
                                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                    </svg>
                                </a>
                                <ul id="attribute" class="iq-submenu collapse" data-parent="#product">
                                    <li class="{{ Request::is('manage-attribute') ? 'active' : '' }}">
                                        <a href="{{URL::to('/manage-attribute')}}">
                                            <i class="las la-minus"></i><span>Nhóm Phân Loại</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('manage-attr-value') ? 'active' : '' }}">
                                        <a href="{{URL::to('/manage-attr-value')}}">
                                            <i class="las la-minus"></i><span>Phân Loại</span>
                                        </a>
                                    </li>
                                </ul>
                              </li>
                              <li class="">
                                <a href="#discount" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                    <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    <span class="ml-4">Khuyến Mãi</span>
                                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                    </svg>
                                </a>
                                <ul id="discount" class="iq-submenu collapse" data-parent="#product">
                                    <li class="{{ Request::is('manage-sale') ? 'active' : '' }}">
                                        <a href="{{URL::to('/manage-sale')}}">
                                            <i class="las la-minus"></i><span>Danh Sách Khuyến Mãi</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('add-sale') ? 'active' : '' }}">
                                        <a href="{{URL::to('/add-sale')}}">
                                            <i class="las la-minus"></i><span>Thêm Khuyến Mãi</span>
                                        </a>
                                    </li>
                                </ul>
                              </li>
                              <li class="">
                                <a href="#voucher" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                    <svg class="svg-icon" id="p-dash2" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    <span class="ml-4">Mã Giảm Giá</span>
                                    <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                    </svg>
                                </a>
                                <ul id="voucher" class="iq-submenu collapse" data-parent="#product">
                                    <li class="{{ Request::is('manage-voucher') ? 'active' : '' }}">
                                        <a href="{{URL::to('/manage-voucher')}}">
                                            <i class="las la-minus"></i><span>Danh Sách Mã</span>
                                        </a>
                                    </li>
                                    <li class="{{ Request::is('add-voucher') ? 'active' : '' }}">
                                        <a href="{{URL::to('/add-voucher')}}">
                                            <i class="las la-minus"></i><span>Thêm Mã</span>
                                        </a>
                                    </li>
                                </ul>
                              </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#category" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Danh Mục</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="{{ Request::is('manage-category') ? 'active' : '' }}">
                                          <a href="{{URL::to('/manage-category')}}">
                                              <i class="las la-minus"></i><span>Danh Sách Danh Mục</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('add-category') ? 'active' : '' }}">
                                          <a href="{{URL::to('/add-category')}}">
                                              <i class="las la-minus"></i><span>Thêm Danh Mục</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <!-- <li class=" ">
                          <a href="#sale" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash4" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                              </svg>
                              <span class="ml-4">Doanh Thu</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="sale" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="../backend/page-list-sale.php">
                                              <i class="las la-minus"></i><span>Danh sách doanh thu</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="../backend/page-add-sale.php">
                                              <i class="las la-minus"></i><span>Thêm doanh thu</span>
                                          </a>
                                  </li>
                          </ul>
                      </li> -->
                      <!-- <li class=" ">
                          <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash6" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="4 14 10 14 10 20"></polyline><polyline points="20 10 14 10 14 4"></polyline><line x1="14" y1="10" x2="21" y2="3"></line><line x1="3" y1="21" x2="10" y2="14"></line>
                              </svg>
                              <span class="ml-4">Đổi trả</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="return" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="">
                                          <a href="../backend/page-list-returns.php">
                                              <i class="las la-minus"></i><span>Danh sách đổi trả</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="../backend/page-add-return.php">
                                              <i class="las la-minus"></i><span>Thêm đổi trả</span>
                                          </a>
                                  </li>
                          </ul>
                      </li> -->
                      </li><li class=" ">
                          <a href="#brand" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash3" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                  <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Thương Hiệu</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="brand" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="{{ Request::is('manage-brand') ? 'active' : '' }}">
                                          <a href="{{URL::to('/manage-brand')}}">
                                              <i class="las la-minus"></i><span>Danh Sách Thương Hiệu</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('add-brand') ? 'active' : '' }}">
                                          <a href="{{URL::to('/add-brand')}}">
                                              <i class="las la-minus"></i><span>Thêm Thương Hiệu</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#people" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Người Dùng</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="people" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="{{ Request::is('manage-customers') ? 'active' : '' }}">
                                          <a href="{{URL::to('/manage-customers')}}">
                                              <i class="las la-minus"></i><span>Danh Sách Tài Khoản Khách Hàng</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('manage-staffs') ? 'active' : '' }}">
                                          <a href="{{URL::to('/manage-staffs')}}">
                                              <i class="las la-minus"></i><span>Danh Sách Nhân Viên</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('add-staffs') ? 'active' : '' }}">
                                          <a href="{{URL::to('/add-staffs')}}">
                                              <i class="las la-minus"></i><span>Thêm Nhân Viên</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#myaccount" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Tài Khoản</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="myaccount" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="{{ Request::is('my-adprofile') ? 'active' : '' }}">
                                          <a href="{{URL::to('/my-adprofile')}}">
                                              <i class="las la-minus"></i><span>Hồ Sơ Của Tôi</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('edit-adprofile') ? 'active' : '' }}">
                                          <a href="{{URL::to('/edit-adprofile')}}">
                                              <i class="las la-minus"></i><span>Sửa Hồ Sơ</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('change-adpassword') ? 'active' : '' }}">
                                          <a href="{{URL::to('/change-adpassword')}}">
                                              <i class="las la-minus"></i><span>Đổi Mật Khẩu</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <!-- <li class="">
                          <a href="../backend/page-report.php" class="">
                              <svg class="svg-icon" id="p-dash7" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                              <span class="ml-4">Báo cáo</span>
                          </a>
                          <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                      </li> -->
                     <!-- <li class=" ">
                          <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash9" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="9"></rect><rect x="14" y="7" width="3" height="5"></rect>
                              </svg>
                              <span class="ml-4">Quản lý tin tức</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a> 
                          <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle"> -->
                                  <!-- <li class=" ">
                                      <a href="#user" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <svg class="svg-icon" id="p-dash10" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline>
                                          </svg>
                                          <span class="ml-4">User Details</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="user" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class="">
                                                  <a href="../app/user-profile.php">
                                                      <i class="las la-minus"></i><span>User Profile</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../app/user-add.php">
                                                      <i class="las la-minus"></i><span>User Add</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../app/user-list.php">
                                                      <i class="las la-minus"></i><span>User List</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li> -->
                                 <!-- <li class=" ">
                                      <a href="#ui" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                         <svg class="svg-icon" id="p-dash11" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                          </svg>
                                          <span class="ml-4">UI Elements</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="ui" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class="">
                                                  <a href="../backend/ui-avatars.php">
                                                      <i class="las la-minus"></i><span>Avatars</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-alerts.php">
                                                      <i class="las la-minus"></i><span>Alerts</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-badges.php">
                                                      <i class="las la-minus"></i><span>Badges</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-breadcrumb.php">
                                                      <i class="las la-minus"></i><span>Breadcrumb</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-buttons.php">
                                                      <i class="las la-minus"></i><span>Buttons</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-buttons-group.php">
                                                      <i class="las la-minus"></i><span>Buttons Group</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-boxshadow.php">
                                                      <i class="las la-minus"></i><span>Box Shadow</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-colors.php">
                                                      <i class="las la-minus"></i><span>Colors</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-cards.php">
                                                      <i class="las la-minus"></i><span>Cards</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-carousel.php">
                                                      <i class="las la-minus"></i><span>Carousel</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-grid.php">
                                                      <i class="las la-minus"></i><span>Grid</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-helper-classes.php">
                                                      <i class="las la-minus"></i><span>Helper classes</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-images.php">
                                                      <i class="las la-minus"></i><span>Images</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-list-group.php">
                                                      <i class="las la-minus"></i><span>list Group</span>
                                                  </a>
                                              </li>
                                              <li  class="">
                                                  <a href="../backend/ui-media-object.php">
                                                      <i class="las la-minus"></i><span>Media</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-modal.php">
                                                      <i class="las la-minus"></i><span>Modal</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-notifications.php">
                                                      <i class="las la-minus"></i><span>Notifications</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-pagination.php">
                                                      <i class="las la-minus"></i><span>Pagination</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-popovers.php">
                                                      <i class="las la-minus"></i><span>Popovers</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-progressbars.php">
                                                      <i class="las la-minus"></i><span>Progressbars</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-typography.php">
                                                      <i class="las la-minus"></i><span>Typography</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-tabs.php">
                                                      <i class="las la-minus"></i><span>Tabs</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-tooltips.php">
                                                      <i class="las la-minus"></i><span>Tooltips</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/ui-embed-video.php">
                                                      <i class="las la-minus"></i><span>Video</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li> -->
                                  <li class=" ">
                          <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Tin Tức</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ Request::is('manage-blog') ? 'active' : '' }}">
                                    <a href="{{URL::to('/manage-blog')}}">
                                        <i class="las la-minus"></i><span>Danh sách tin tức</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('add-blog') ? 'active' : '' }}">
                                    <a href="{{URL::to('/add-blog')}}">
                                        <i class="las la-minus"></i><span>Thêm tin tức</span>
                                    </a>
                                </li>
                                <!--  <li class="">
                                          <a href="../app/user-profile-edit.php">
                                              <i class="las la-minus"></i><span>Sửa Hồ Sơ</span>
                                          </a>
                                  </li> -->
                          </ul>
                      </li>
                                <!--  <li class=" ">
                                      <a href="#auth" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <svg class="svg-icon" id="p-dash12" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                                          </svg>
                                          <span class="ml-4">Authentication</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="auth" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class="">
                                                  <a href="../backend/auth-sign-in.php">
                                                      <i class="las la-minus"></i><span>Login</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/auth-sign-up.php">
                                                      <i class="las la-minus"></i><span>Register</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/auth-recoverpw.php">
                                                      <i class="las la-minus"></i><span>Recover Password</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/auth-confirm-mail.php">
                                                      <i class="las la-minus"></i><span>Confirm Mail</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/auth-lock-screen.php">
                                                      <i class="las la-minus"></i><span>Lock Screen</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class="">
                                      <a href="#form" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                                          <svg class="svg-icon" id="p-dash13" width="20" height="20"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                          </svg>
                                          <span class="ml-4">Forms</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="form" class="iq-submenu collapse" data-parent="#otherpage">
                                          <li class="">
                                              <a href="../backend/form-layout.php">
                                                  <i class="las la-minus"></i><span class="">Form Elements</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="../backend/form-input-group.php" class="svg-icon">
                                                 <i class="las la-minus"></i><span class="">Form Input</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="../backend/form-validation.php" class="svg-icon">
                                                  <i class="las la-minus"></i><span class="">Form Validation</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="../backend/form-switch.php" class="svg-icon">
                                                  <i class="las la-minus"></i><span class="">Form Switch</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="../backend/form-chechbox.php" class="svg-icon">
                                                  <i class="las la-minus"></i><span class="">Form Checkbox</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="../backend/form-radio.php" class="svg-icon">
                                                  <i class="las la-minus"></i><span class="">Form Radio</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a href="../backend/form-textarea.php" class="svg-icon">
                                                  <i class="las la-minus"></i><span class="">Form Textarea</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </li> 
                                  <li class=" ">
                                      <a href="#table" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <svg class="svg-icon" id="p-dash14" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect>
                                          </svg>
                                          <span class="ml-4">Table</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="table" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class="">
                                                  <a href="../backend/tables-basic.php">
                                                      <i class="las la-minus"></i><span>Basic Tables</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/table-data.php">
                                                      <i class="las la-minus"></i><span>Data Table</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/table-tree.php">
                                                      <i class="las la-minus"></i><span>Table Tree</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li> 
                                  <li class=" ">
                                      <a href="#pricing" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <svg class="svg-icon" id="p-dash16" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                          </svg>
                                          <span class="ml-4">Pricing</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="pricing" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class="">
                                                  <a href="../backend/pricing.php">
                                                      <i class="las la-minus"></i><span>Pricing 1</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/pricing-2.php">
                                                      <i class="las la-minus"></i><span>Pricing 2</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class="">
                                      <a href="../backend/pages-invoice.php" class="svg-icon">
                                          <svg class="svg-icon" id="p-dash07" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline>
                                          </svg>
                                          <span class="ml-4">Invoice</span>
                                      </a>
                                  </li>
                                  <li class=" ">
                                      <a href="#pages-error" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                          <svg class="svg-icon" id="p-dash17" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line>
                                          </svg>
                                          <span class="ml-4">Error</span>
                                          <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                              <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                          </svg>
                                      </a>
                                      <ul id="pages-error" class="iq-submenu collapse" data-parent="#otherpage">
                                              <li class="">
                                                  <a href="../backend/pages-error.php">
                                                      <i class="las la-minus"></i><span>Error 404</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="../backend/pages-error-500.php">
                                                      <i class="las la-minus"></i><span>Error 500</span>
                                                  </a>
                                              </li>
                                      </ul>
                                  </li>
                                  <li class="">
                                          <a href="../backend/pages-blank-page.php">
                                              <svg class="svg-icon" id="p-dash18" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                  <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline>
                                              </svg>
                                              <span class="ml-4">Blank Page</span>
                                          </a>
                                  </li>
                                  <li class="">
                                          <a href="../backend/pages-maintenance.php">
                                              <svg class="svg-icon" id="p-dash19" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                  <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                                              </svg>
                                              <span class="ml-4">Maintenance</span>
                                          </a>
                                  </li> 
                          </ul>
                      </li> -->
                  </ul>
              </nav>
              <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                  <div class="card border-none">
                      <div class="card-body p-0">
                          <div class="sidebarbottom-content">
                              <div class="image"><img src="{{asset('public/kidoldash/images/layouts/side-bkg.png')}}" class="img-fluid" alt="side-bkg"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="p-3"></div>
          </div>
          <?php
            }else{
          ?>
          <div class="data-scrollbar" data-scroll="1">
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li class=" ">
                          <a href="#purchase" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash5" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                  <line x1="1" y1="10" x2="23" y2="10"></line>
                              </svg>
                              <span class="ml-4">Quản Lý Đơn Hàng</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="purchase" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ Request::is('list-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/list-bill')}}">
                                        <i class="las la-minus"></i><span>Danh Sách Đơn Hàng</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('waiting-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/waiting-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Chờ Xác Nhận</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('shipping-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/shipping-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đang Giao</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('shipped-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/shipped-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đã Giao</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('cancelled-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/cancelled-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đã Hủy</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('confirmed-bill') ? 'active' : '' }}">
                                    <a href="{{URL::to('/confirmed-bill')}}">
                                        <i class="las la-minus"></i><span>Đơn Đã Xác Nhận</span>
                                    </a>
                                </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#myaccount" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Tài Khoản</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="myaccount" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                  <li class="{{ Request::is('my-adprofile') ? 'active' : '' }}">
                                          <a href="{{URL::to('/my-adprofile')}}">
                                              <i class="las la-minus"></i><span>Hồ Sơ Của Tôi</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('edit-adprofile') ? 'active' : '' }}">
                                          <a href="{{URL::to('/edit-adprofile')}}">
                                              <i class="las la-minus"></i><span>Sửa Hồ Sơ</span>
                                          </a>
                                  </li>
                                  <li class="{{ Request::is('change-adpassword') ? 'active' : '' }}">
                                          <a href="{{URL::to('/change-adpassword')}}">
                                              <i class="las la-minus"></i><span>Đổi Mật Khẩu</span>
                                          </a>
                                  </li>
                          </ul>
                      </li>
                      <li class=" ">
                          <a href="#otherpage" class="collapsed" data-toggle="collapse" aria-expanded="false">
                              <svg class="svg-icon" id="p-dash8" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                              </svg>
                              <span class="ml-4">Quản Lý Tin Tức</span>
                              <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <polyline points="10 15 15 20 20 15"></polyline><path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                              </svg>
                          </a>
                          <ul id="otherpage" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                                <li class="{{ Request::is('manage-blog') ? 'active' : '' }}">
                                    <a href="{{URL::to('/manage-blog')}}">
                                        <i class="las la-minus"></i><span>Danh sách tin tức</span>
                                    </a>
                                </li>
                                <li class="{{ Request::is('add-blog') ? 'active' : '' }}"> 
                                    <a href="{{URL::to('/add-blog')}}">
                                        <i class="las la-minus"></i><span>Thêm tin tức</span>
                                    </a>
                                </li>
                          </ul>
                      </li>
                  </ul>
              </nav>
              <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                  <div class="card border-none">
                      <div class="card-body p-0">
                          <div class="sidebarbottom-content">
                              <div class="image"><img src="{{asset('public/kidoldash/images/layouts/side-bkg.png')}}" class="img-fluid" alt="side-bkg"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="p-3"></div>
          </div>
          <?php
            }
          ?>
          </div>      <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                      <i class="ri-menu-line wrapper-menu"></i>
                      <a href="{{URL::to('/dashboard')}}" class="header-logo">
                          <img src="{{asset('public/kidoldash/images/logo.png')}}" class="img-fluid rounded-normal" alt="logo">
                          <h5 class="logo-title ml-3">KidolDash</h5>
      
                      </a>
                  </div>
                  <div class="iq-search-bar device-search">
                      <form action="#" class="searchbox">
                          <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                          <input type="text" class="text search-input" placeholder="Search here...">
                      </form>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                          aria-label="Toggle navigation">
                          <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                              <li class="nav-item nav-icon dropdown">
                                  <a href="#" class="search-toggle dropdown-toggle btn border add-btn"
                                      id="dropdownMenuButton02" data-toggle="dropdown" aria-haspopup="true"
                                      aria-expanded="false">
                                      <img src="{{asset('public/kidoldash/images/small/Vietnam-Flag.png')}}" alt="img-flag"
                                          class="img-fluid image-flag mr-2">Vi
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-3">
                                              <a class="iq-sub-card" href="#"><img
                                                      src="{{asset('public/kidoldash/images/small/flag-02.png')}}" alt="img-flag"
                                                      class="img-fluid mr-2">French</a>
                                              <a class="iq-sub-card" href="#"><img
                                                      src="{{asset('public/kidoldash/images/small/flag-03.png')}}" alt="img-flag"
                                                      class="img-fluid mr-2">Spanish</a>
                                              <a class="iq-sub-card" href="#"><img
                                                      src="{{asset('public/kidoldash/images/small/flag-04.png')}}" alt="img-flag"
                                                      class="img-fluid mr-2">Italian</a>
                                              <a class="iq-sub-card" href="#"><img
                                                      src="{{asset('public/kidoldash/images/small/flag-05.png')}}" alt="img-flag"
                                                      class="img-fluid mr-2">German</a>
                                              <a class="iq-sub-card" href="#"><img
                                                      src="{{asset('public/kidoldash/images/small/flag-06.png')}}" alt="img-flag"
                                                      class="img-fluid mr-2">Japanese</a>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li>
                                  <a href="#" class="btn border add-btn shadow-none mx-2 d-none d-md-block"
                                      data-toggle="modal" data-target="#new-order"><i class="las la-plus mr-2"></i>New
                                      Order</a>
                              </li>
                              <li class="nav-item nav-icon search-content">
                                  <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">
                                      <i class="ri-search-line"></i>
                                  </a>
                                  <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownSearch">
                                      <form action="#" class="searchbox p-2">
                                          <div class="form-group mb-0 position-relative">
                                              <input type="text" class="text search-input font-size-12"
                                                  placeholder="type here to search...">
                                              <a href="#" class="search-link"><i class="las la-search"></i></a>
                                          </div>
                                      </form>
                                  </div>
                              </li>
                              <li class="nav-item nav-icon dropdown">
                                  <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round" class="feather feather-mail">
                                          <path
                                              d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                          </path>
                                          <polyline points="22,6 12,13 2,6"></polyline>
                                      </svg>
                                      <span class="bg-primary"></span>
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-0 ">
                                              <div class="cust-title p-3">
                                                  <div class="d-flex align-items-center justify-content-between">
                                                      <h5 class="mb-0">All Messages</h5>
                                                      <a class="badge badge-primary badge-card" href="#">3</a>
                                                  </div>
                                              </div>
                                              <div class="px-3 pt-0 pb-0 sub-card">
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card py-3 border-bottom">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small"
                                                                  src="{{asset('public/kidoldash/images/user/01.jpg')}}" alt="01">
                                                          </div>
                                                          <div class="media-body ml-3">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h6 class="mb-0">Emma Watson</h6>
                                                                  <small class="text-dark"><b>12 : 47 pm</b></small>
                                                              </div>
                                                              <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card py-3 border-bottom">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small"
                                                                  src="{{asset('public/kidoldash/images/user/02.jpg')}}" alt="02">
                                                          </div>
                                                          <div class="media-body ml-3">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h6 class="mb-0">Ashlynn Franci</h6>
                                                                  <small class="text-dark"><b>11 : 30 pm</b></small>
                                                              </div>
                                                              <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card py-3">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small"
                                                                  src="{{asset('public/kidoldash/images/user/03.jpg')}}" alt="03">
                                                          </div>
                                                          <div class="media-body ml-3">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h6 class="mb-0">Kianna Carder</h6>
                                                                  <small class="text-dark"><b>11 : 21 pm</b></small>
                                                              </div>
                                                              <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                              </div>
                                              <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                                  role="button">
                                                  View All
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li class="nav-item nav-icon dropdown">
                                  <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round" class="feather feather-bell">
                                          <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                      </svg>
                                      <span class="bg-primary "></span>
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-0 ">
                                              <div class="cust-title p-3">
                                                  <div class="d-flex align-items-center justify-content-between">
                                                      <h5 class="mb-0">Thông báo</h5>
                                                      <a class="badge badge-primary badge-card" href="#">2</a>
                                                  </div>
                                              </div>
                                              <div class="px-3 pt-0 pb-0 sub-card">
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card py-3 border-bottom">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small"
                                                                  src="{{asset('public/kidoldash/images/logo.png')}}" alt="01">
                                                          </div>
                                                          <div class="media-body ml-3">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h6 class="mb-0">Sao lưu dữ liệu</h6>
                                                                  <small class="text-dark"><b>12 : 47 pm</b></small>
                                                              </div>
                                                              <small class="mb-0">Đã đến thời gian sao lưu dữ liệu, nhấn để xem chi tiết!</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                                  <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card py-3 border-bottom">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small"
                                                                  src="{{asset('public/kidoldash/images/logo.png')}}" alt="01">
                                                          </div>
                                                          <div class="media-body ml-3">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h6 class="mb-0">Bảo trì hệ thống</h6>
                                                                  <small class="text-dark"><b>16 : 50 pm</b></small>
                                                              </div>
                                                              <small class="mb-0">Đã đến thời gian bảo trì hệ thống, nhấn để xem chi tiết!</small>
                                                          </div>
                                                      </div>
                                                  </a>
                                                  <!-- <a href="#" class="iq-sub-card">
                                                      <div class="media align-items-center cust-card py-3 border-bottom">
                                                          <div class="">
                                                              <img class="avatar-50 rounded-small"
                                                                  src="{{asset('public/kidoldash/images/user/01.jpg')}}" alt="01">
                                                          </div>
                                                          <div class="media-body ml-3">
                                                              <div class="d-flex align-items-center justify-content-between">
                                                                  <h6 class="mb-0">Emma Watson</h6>
                                                                  <small class="text-dark"><b>12 : 47 pm</b></small>
                                                              </div>
                                                              <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                          </div>
                                                      </div>
                                                  </a> -->
                                              </div>
                                              <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                                  role="button">
                                                  Xem tất cả
                                              </a>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                
                              <li class="nav-item nav-icon dropdown caption-content">
                                  <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       @if($avatar != '')
                                        <img src="{{asset('public/storage/kidoldash/images/user/'.$avatar)}}" class="img-fluid rounded" alt="user">
                                       @else
                                        <img src="{{asset('public/kidoldash/images/user/12.jpg')}}" class="img-fluid rounded" alt="user">
                                       @endif
                                  </a>
                                  <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <div class="card shadow-none m-0">
                                          <div class="card-body p-0 text-center">
                                              <div class="media-body profile-detail text-center">
                                                  <img src="{{asset('public/kidoldash/images/page-img/profile-bg.jpg')}}" alt="profile-bg"
                                                      class="rounded-top img-fluid mb-4">
                                                  @if($avatar != null)
                                                  <img src="{{asset('public/storage/kidoldash/images/user/'.$avatar)}}" alt="profile-img"
                                                      class="rounded profile-img img-fluid avatar-70">
                                                  @else
                                                  <img src="{{asset('public/kidoldash/images/user/12.jpg')}}" alt="profile-img"
                                                      class="rounded profile-img img-fluid avatar-70">
                                                  @endif
                                              </div>
                                              <div class="p-3">
                                                  <h5 class="mb-1"><?php echo Session::get('AdminName'); ?></h5>
                                                  <p class="mb-0">(<?php echo Session::get('AdminUser'); ?>)</p>
                                                  <div class="d-flex align-items-center justify-content-center mt-3">
                                                        <a href="" class="btn border mr-2">Profile</a>
                                                        <a href="{{URL::to('/admin-logout')}}" class="btn border">Đăng Xuất</a>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
              </nav>
          </div>
      </div>
      <div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="popup text-left">
                          <h4 class="mb-3">New Order</h4>
                          <div class="content create-workform bg-body">
                              <div class="pb-3">
                                  <label class="mb-2">Email</label>
                                  <input type="text" class="form-control" placeholder="Enter Name or Email">
                              </div>
                              <div class="col-lg-12 mt-4">
                                  <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                      <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                      <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      @yield('content_dash')

    </div>
    <!-- Wrapper End-->

    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="../backend/privacy-policy.php">Privacy Policy</a></li>
                                <li class="list-inline-item"><a href="../backend/terms-of-service.php">Terms of Use</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 text-right">
                            <span class="mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">KidolDash</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- Backend Bundle JavaScript -->
<script src="{{asset('public/kidoldash/js/backend-bundle.min.js')}}"></script>

<!-- Table Treeview JavaScript -->
<script src="{{asset('public/kidoldash/js/table-treeview.js')}}"></script>

<!-- Chart Custom JavaScript -->
<script src="{{asset('public/kidoldash/js/customizer.js')}}"></script>

<!-- Chart Custom JavaScript -->
<script async src="{{asset('public/kidoldash/js/chart-custom.js')}}"></script>

<!-- app JavaScript -->
<script src="{{asset('public/kidoldash/js/app.js')}}"></script>

<script src="{{asset('public/kidoldash/js/ckeditor/ckeditor.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('public/kidoldash/datetimepicker-master/jquery.datetimepicker.css')}}">
<script src="{{asset('public/kidoldash/datetimepicker-master/jquery.js')}}"></script>
<script src="{{asset('public/kidoldash/datetimepicker-master/build/jquery.datetimepicker.full.min.js')}}"></script>
<script src="{{asset('public/kidoldash/js/moment.js')}}"></script>
<script src="{{asset('public/kidoldash/js/form-validate.js')}}"></script>

<script type="text/javascript">
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = $('.slug').val();
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            $('#convert_slug').val(slug);
        }
</script>

</body>
</html>

