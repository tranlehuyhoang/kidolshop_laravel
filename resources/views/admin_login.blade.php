
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>KidolDash | Login</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('public/kidoldash/images/favicon.ico')}}" />
      <link rel="stylesheet" href="{{asset('public/kidoldash/css/backend-plugin.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/css/backend.css?v=1.0.0')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css')}}">
      <link rel="stylesheet" href="{{asset('public/kidoldash/vendor/remixicon/fonts/remixicon.css')}}">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
   <?php use Illuminate\Support\Facades\Session; ?>
      <div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Đăng Nhập</h2>
                                 <p>Đăng nhập để giữ kết nối.</p>
                                 <?php
                                    $message = Session::get('message');
                                    if($message){
                                       echo '<span class="text-danger">'.$message.'</span>';
                                       Session::put('message', null);
                                    }
                                 ?>
                                 <form action="{{URL::to('/admin-login')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder=" " name="AdminUser" required>
                                             <label>Tên Đăng Nhập</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="password" placeholder=" " name="AdminPass" required>
                                             <label>Mật Khẩu</label>
                                          </div>
                                       </div>
                                    </div>
                                    <!-- <button type="submit" class="btn btn-primary">Đăng Nhập</button> -->
                                    <input type="submit" class="btn btn-primary" value = "Đăng Nhập"/>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="public/kidoldash/images/login/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
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

    <script src="{{asset('public/kidoldash/js/form-validate.js')}}"></script>
  </body>
</html>