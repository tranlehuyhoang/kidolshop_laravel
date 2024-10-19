<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillInfo;
use App\Models\Statistic;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
session_start();

class AdminController extends Controller
{
    // Kiểm tra đăng nhập
    public function checkLogin(){
        $idAdmin = Session::get('idAdmin');
        if($idAdmin == false) return Redirect::to('admin')->send();
    }

    // Kiểm tra chức vụ
    public function checkPostion(){
        $position = Session::get('Position');
        if($position === 'Nhân Viên') return Redirect::to('/my-adprofile')->send();
    }

    // Chuyển đến trang đăng nhập
    public function show_login(){
        if(Session::get('idAdmin')) return Redirect::to('dashboard');
        else return view("admin_login");
    }

    // Chuyển đến trang thống kê
    public function show_dashboard(){
        $this->checkLogin();
        $this->checkPostion();
        $start_this_month = Carbon::now()->startOfMonth()->toDateString(); 
        
        $total_revenue = Bill::whereNotIn('Status',[99])->sum('TotalBill');
        $total_sell = BillInfo::join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('Status',[99])->sum('QuantityBuy');

        $list_topProduct = Product::join('productimage','productimage.idProduct','=','product.idProduct')
            ->join('billinfo','billinfo.idProduct','=','product.idProduct')
            ->join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('Status',[99])
            ->whereBetween('bill.created_at', [$start_this_month,now()])
            ->select('ProductName','ImageName')
            ->selectRaw('sum(QuantityBuy) as Sold')
            ->groupBy('ProductName','ImageName')->orderBy('Sold','DESC')->take(6)->get();

        $list_topProduct_AllTime = Product::join('productimage','productimage.idProduct','=','product.idProduct')
            ->whereRaw('Sold > 0')->orderBy('Sold','DESC')->take(5)->get();

        return view("admin.dashboard")->with(compact('total_revenue','total_sell','list_topProduct','list_topProduct_AllTime'));
    }

    // Chuyển đến trang hồ sơ cá nhân
    public function my_adprofile(){
        $this->checkLogin();
        return view("admin.my-account.my-adprofile");
    }

    // Chuyển đến trang chỉnh sửa hồ sơ cá nhân
    public function edit_adprofile(){
        $this->checkLogin();
        return view("admin.my-account.edit-adprofile");
    }

    // Chuyển đến trang đổi mật khẩu
    public function change_adpassword(){
        $this->checkLogin();
        return view("admin.my-account.change-adpassword");
    }

    // Chuyển đến trang quản lý nhân viên
    public function manage_staffs(){
        $this->checkLogin();
        $this->checkPostion();
        $list_staff = Admin::whereNotIn('idAdmin', [0])->get();
        $count_staff = Admin::whereNotIn('idAdmin', [0])->count();
        return view("admin.manage-users.manage-staffs")->with(compact('list_staff','count_staff'));
    }

    // Chuyển đến trang thêm nhân viên
    public function add_staffs(){
        $this->checkLogin();
        $this->checkPostion();
        return view("admin.manage-users.add-staffs");
    }

    // Chuyển đến trang quản lý tài khoản khách hàng
    public function manage_customers(){
        $this->checkLogin();
        $this->checkPostion();
        $list_customer = Customer::get();
        $count_customer = Customer::count();
        return view("admin.manage-users.manage-customers")->with(compact('list_customer','count_customer'));
    }

    // Đăng nhập tài khoản
    public function admin_login(Request $request){
        $data = $request->all();
        $AdminUser = $data['AdminUser'];
        $AdminPass = md5($data['AdminPass']);

        $login = Admin::where('AdminUser', $AdminUser)->where('AdminPass', $AdminPass)->first();
        
        if($login){
            Session::put('idAdmin', $login->idAdmin);
            Session::put('AdminUser', $login->AdminUser);
            Session::put('AdminName', $login->AdminName);
            Session::put('Address', $login->Address);
            Session::put('NumberPhone', $login->NumberPhone);
            Session::put('Email', $login->Email);
            Session::put('Avatar', $login->Avatar);
            Session::put('Position', $login->Position);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message', 'Mật khẩu hoặc tài khoản không đúng!!');
            return Redirect::to('/admin');
        }
    }

    // Đăng xuất tài khoản
    public function admin_logout(){
        $this->checkLogin();
        Session::put('idAdmin', null);
        return Redirect::to('/admin');
    }

    // Chỉnh sửa hồ sơ cá nhân
    public function submit_edit_adprofile(Request $request){
        $data = $request->all();
        $admin = Admin::find(Session::get('idAdmin'));

        $admin->AdminName = $data['AdminName'];
        $admin->NumberPhone = $data['NumberPhone'];
        $admin->Email = $data['Email'];
        $admin->Address = $data['Address'];

        if ($request->file('Avatar')){
            $get_image = $request->file('Avatar');

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->storeAs('public/kidoldash/images/user',$new_image);
            $admin->Avatar = $new_image; 
            Session::put('Avatar', $new_image);

            $get_old_img = Admin::where('idAdmin', Session::get('idAdmin'))->first();
            Storage::delete('public/kidoldash/images/user/'.$get_old_img->Avatar);
        }

        $admin->save();
        Session::put('AdminName', $data['AdminName']);
        Session::put('Address', $data['Address']);
        Session::put('NumberPhone', $data['NumberPhone']);
        Session::put('Email', $data['Email']);
        return redirect()->back()->with('message', 'Sửa hồ sơ thành công');
    }

    // Đổi mật khẩu
    public function submit_change_adpassword(Request $request){
        $data = $request->all();
        $admin = Admin::find(Session::get('idAdmin'));

        if(md5($data['password']) != $admin->AdminPass){
            return redirect()->back()->with('error', 'Nhập mật khẩu cũ không đúng');
        }else{
            $admin->AdminPass = md5($data['newpassword']);
            $admin->save();
            return redirect()->back()->with('message', 'Đổi mật khẩu thành công');
        }
    }

    // Thêm nhân viên
    public function submit_add_staffs(Request $request){
        $data = $request->all();
        $admin = new Admin();
        
        $check_admin_user = Admin::where('AdminUser', $data['AdminUser'])->first();

        if($check_admin_user){
            return redirect()->back()->with('error', 'Tài khoản nhân viên này đã tồn tại');
        }else{
            $admin->AdminName = $data['AdminName'];
            $admin->AdminUser = $data['AdminUser'];
            $admin->AdminPass = md5($data['AdminPass']);
            $admin->Position = $data['Position'];
            $admin->Address = $data['Address'];
            $admin->NumberPhone = $data['NumberPhone'];
            $admin->Email = $data['Email'];
            $admin->save();
            return redirect()->back()->with('message', 'Thêm nhân viên thành công');
        }
    }

    // Xóa nhân viên
    public function delete_staff($idAdmin){
        $admin = Admin::find($idAdmin);

        if($admin->Position === 'Quản Lý'){
            return redirect()->back()->with('error', 'Không thể xóa tài khoản quản lý');
        }else{
            Admin::find($idAdmin)->delete();
            return redirect()->back();
        }
    }

    // Xóa tài khoản khách hàng
    public function delete_customer($idCustomer){
        Customer::find($idCustomer)->delete();
        return redirect()->back();
    }

    // Thống kê doanh thu theo ngày đã chọn
    public function statistic_by_date(Request $request){
        $data = $request->all();

        $DateFrom = $data['DateFrom'];
        $DateTo = $data['DateTo']; 

        $get_statistic = Bill::whereNotIn('bill.Status',[99])->whereBetween('created_at',[$DateFrom,$DateTo])
            ->selectRaw('sum(TotalBill) as Sale, count(idBill) as QtyBill, date(created_at) as Date')
            ->groupBy('Date')->get();
        $total_sold = BillInfo::join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
            ->whereBetween('bill.created_at',[$DateFrom,$DateTo])->selectRaw('sum(QuantityBuy) as TotalSold, date(bill.created_at) as Date')
            ->groupBy('Date')->get();

        if($get_statistic->count() > 0){
            foreach($get_statistic as $key => $statistic)
            {
                $chart_data[] = array(
                    'Date' => $statistic->Date,
                    'Sale' => $statistic->Sale,
                    'TotalSold' => $total_sold[$key]->TotalSold,
                    'QtyBill' => $statistic->QtyBill
                ); 
            }
        }else $chart_data[] = array();

        echo $data = json_encode($chart_data); 
    }

    // Thống kê doanh thu 7 ngày qua
    public function chart_7days(){

        $sub7days = Carbon::now()->subDays(7)->toDateString();

        $get_statistic = Bill::whereNotIn('bill.Status',[99])->whereBetween('created_at',[$sub7days,now()])
            ->selectRaw('sum(TotalBill) as Sale, count(idBill) as QtyBill, date(created_at) as Date')
            ->groupBy('Date')->get();
        $total_sold = BillInfo::join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
            ->whereBetween('bill.created_at',[$sub7days,now()])->selectRaw('sum(QuantityBuy) as TotalSold, date(bill.created_at) as Date')
            ->groupBy('Date')->get();

        if($get_statistic->count() > 0){
            foreach($get_statistic as $key => $statistic)
            {
                $chart_data[] = array(
                    'Date' => $statistic->Date,
                    'Sale' => $statistic->Sale,
                    'TotalSold' => $total_sold[$key]->TotalSold,
                    'QtyBill' => $statistic->QtyBill
                ); 
            }
        }else $chart_data[] = array();

        echo $data = json_encode($chart_data); 
    }

    // Thống kê doanh thu theo ngày, tháng, năm
    public function statistic_by_date_order(Request $request){
        $data = $request->all();

        $sub7days = Carbon::now()->subDays(7)->toDateString();
        $sub30days = Carbon::now()->subDays(30)->toDateString();
        $sub365days = Carbon::now()->subDays(365)->toDateString();

        if($data['Days'] == 'lastweek'){
            $get_statistic = Bill::whereNotIn('bill.Status',[99])->whereBetween('created_at',[$sub7days,now()])
                ->selectRaw('sum(TotalBill) as Sale, count(idBill) as QtyBill, date(created_at) as Date')
                ->groupBy('Date')->get();
            $total_sold = BillInfo::join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
                ->whereBetween('bill.created_at',[$sub7days,now()])->selectRaw('sum(QuantityBuy) as TotalSold, date(bill.created_at) as Date')
                ->groupBy('Date')->get();
        }
        else if($data['Days'] == 'lastmonth'){
            $get_statistic = Bill::whereNotIn('bill.Status',[99])->whereBetween('created_at',[$sub30days,now()])
                ->selectRaw('sum(TotalBill) as Sale, count(idBill) as QtyBill, date(created_at) as Date')
                ->groupBy('Date')->get();
            $total_sold = BillInfo::join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
                ->whereBetween('bill.created_at',[$sub30days,now()])->selectRaw('sum(QuantityBuy) as TotalSold, date(bill.created_at) as Date')
                ->groupBy('Date')->get();
        }
        else if($data['Days'] == 'lastyear'){
            $get_statistic = Bill::whereNotIn('bill.Status',[99])->whereBetween('created_at',[$sub365days,now()])
                ->selectRaw('sum(TotalBill) as Sale, count(idBill) as QtyBill, date(created_at) as Date')
                ->groupBy('Date')->get();
            $total_sold = BillInfo::join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
                ->whereBetween('bill.created_at',[$sub365days,now()])->selectRaw('sum(QuantityBuy) as TotalSold, date(bill.created_at) as Date')
                ->groupBy('Date')->get();
        }

        if($get_statistic->count() > 0){
            foreach($get_statistic as $key => $statistic)
            {
                $chart_data[] = array(
                    'Date' => $statistic->Date,
                    'Sale' => $statistic->Sale,
                    'TotalSold' => $total_sold[$key]->TotalSold,
                    'QtyBill' => $statistic->QtyBill
                ); 
            }
        }else $chart_data[] = array();
        
        echo $data = json_encode($chart_data); 
    }

    // Thống kê top sản phẩm bán chạy trong tuần, tháng, năm
    public function topPro_sort_by_date(Request $request){
        $data = $request->all();
        $output = '';

        $start_this_week = Carbon::now()->startOfWeek()->toDateString();
        $start_this_month = Carbon::now()->startOfMonth()->toDateString();
        $start_this_year = Carbon::now()->startOfYear()->toDateString();

        if($data['sort_by'] == 'week')
            $list_topProduct = Product::join('productimage','productimage.idProduct','=','product.idProduct')
            ->join('billinfo','billinfo.idProduct','=','product.idProduct')
            ->join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
            ->whereBetween('bill.created_at', [$start_this_week,now()])
            ->select('ProductName','ImageName')
            ->selectRaw('sum(QuantityBuy) as Sold')
            ->groupBy('ProductName','ImageName')->orderBy('Sold','DESC')->take(6)->get();
        else if($data['sort_by'] == 'month')
            $list_topProduct = Product::join('productimage','productimage.idProduct','=','product.idProduct')
            ->join('billinfo','billinfo.idProduct','=','product.idProduct')
            ->join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
            ->whereBetween('bill.created_at', [$start_this_month,now()])
            ->select('ProductName','ImageName')
            ->selectRaw('sum(QuantityBuy) as Sold')
            ->groupBy('ProductName','ImageName')->orderBy('Sold','DESC')->take(6)->get();
        else if($data['sort_by'] == 'year')
            $list_topProduct = Product::join('productimage','productimage.idProduct','=','product.idProduct')
            ->join('billinfo','billinfo.idProduct','=','product.idProduct')
            ->join('bill','bill.idBill','=','billinfo.idBill')->whereNotIn('bill.Status',[99])
            ->whereBetween('bill.created_at', [$start_this_year,now()])
            ->select('ProductName','ImageName')
            ->selectRaw('sum(QuantityBuy) as Sold')
            ->groupBy('ProductName','ImageName')->orderBy('Sold','DESC')->take(6)->get();

        $output .= '<ul class="list-unstyled row mb-0">';
        foreach($list_topProduct as $key => $topProduct){
            $image = json_decode($topProduct->ImageName)[0];
            $output .= '
                <li class="col-lg-4 topPro-item">
                    <div class="card card-block card-stretch mb-0">
                        <div class="card-body">
                            <div class="bg-warning-light rounded">
                                <img src="public/storage/kidoldash/images/product/'.$image.'" class="style-img img-fluid m-auto p-3" alt="image">
                            </div>
                            <div class="style-text text-left mt-3">
                                <h5 class="mb-1 limit-2-lines">'.$topProduct->ProductName.'</h5>
                                <p class="mb-0">Đã bán: '.number_format($topProduct->Sold,0,',','.').'</p>
                            </div>
                        </div>
                    </div>
                </li>
            ';
        }
        $output .= '</ul>';
        
        echo $output;
    }
}
