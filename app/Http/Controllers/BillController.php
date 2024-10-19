<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\AddressCustomer;
use App\Models\Bill;
use App\Models\BillHistory;
use App\Models\BillInfo;
use App\Models\Cart;
use App\Models\Voucher;
use App\Models\Statistic;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /* ---------- Admin ---------- */

        // Kiểm tra đăng nhập
        public function checkLogin_Admin(){
            $idAdmin = Session::get('idAdmin');
            if($idAdmin == false) return Redirect::to('admin')->send();
        }

        // Hiện tất cả đơn đặt hàng
        public function list_bill(){
            $this->checkLogin_Admin();
            $list_bill = Bill::join('customer','bill.idCustomer','=','customer.idCustomer')->whereNotIn('Status',[99])
            ->select('customer.username','customer.PhoneNumber as CusPhone','bill.*')->get();
            return view("admin.bill.list-bill")->with(compact('list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đang chờ xác nhận
        public function waiting_bill(){
            $this->checkLogin_Admin();

            $list_bill = Bill::join('customer','bill.idCustomer','=','customer.idCustomer')->where('Status','0')
                ->select('bill.*','customer.username','customer.PhoneNumber as CusPhone')->get();
            return view("admin.bill.waiting-bill")->with(compact('list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đang giao
        public function shipping_bill(){
            $this->checkLogin_Admin();

            $list_bill = Bill::join('customer','bill.idCustomer','=','customer.idCustomer')
                ->join('billhistory','billhistory.idBill','=','bill.idBill')->where('bill.Status','1')
                ->select('bill.*','customer.username','customer.PhoneNumber as CusPhone','billhistory.AdminName','billhistory.created_at AS TimeConfirm')->get();
            return view("admin.bill.shipping-bill")->with(compact('list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đã giao
        public function shipped_bill(){
            $this->checkLogin_Admin();

            $list_bill = Bill::join('customer','bill.idCustomer','=','customer.idCustomer')->where('bill.Status','2')
                ->select('bill.*','customer.username','customer.PhoneNumber as CusPhone')->get();
            return view("admin.bill.shipped-bill")->with(compact('list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đã hủy
        public function cancelled_bill(){
            $this->checkLogin_Admin();

            $list_bill = Bill::join('customer','bill.idCustomer','=','customer.idCustomer')
                ->join('billhistory','billhistory.idBill','=','bill.idBill')->where('bill.Status','99')
                ->select('bill.*','customer.username','customer.PhoneNumber as CusPhone','billhistory.AdminName','billhistory.created_at AS TimeConfirm')->get();
            return view("admin.bill.cancelled-bill")->with(compact('list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đã xác nhận
        public function confirmed_bill(){
            $this->checkLogin_Admin();

            $list_bill = Bill::join('customer','bill.idCustomer','=','customer.idCustomer')
                ->join('billhistory','billhistory.idBill','=','bill.idBill')->where('billhistory.Status','1')
                ->select('bill.*','customer.username','customer.PhoneNumber as CusPhone','billhistory.AdminName','billhistory.created_at AS TimeConfirm')->get();
            return view("admin.bill.confirmed-bill")->with(compact('list_bill'));
        }

        // Hiện chi tiết đơn đặt hàng
        public function bill_info($idBill){
            $this->checkLogin_Admin();

            $address = Bill::where('idBill',$idBill)->first();

            $list_bill_info = BillInfo::join('product','product.idProduct','=','billinfo.idProduct')
                ->join('productimage','productimage.idProduct','=','billinfo.idProduct')
                ->where('billinfo.idBill',$idBill)
                ->select('product.ProductName','product.idProduct','productimage.ImageName','billinfo.*')->get();
            
            return view("admin.bill.bill-info")->with(compact('address','list_bill_info'));
        }

        // Xác nhận đơn hàng
        public function confirm_bill(Request $request, $idBill){  
            if($request->Status == 2){
                Bill::find($idBill)->update(['ReceiveDate' => now(),'Status' => $request->Status]); 
                
                $BillInfo = BillInfo::where('idBill',$idBill)->get();
                foreach($BillInfo as $key => $bi){
                    DB::update('update product set Sold = Sold + ? where idProduct = ?',[$bi->QuantityBuy,$bi->idProduct]);
                }
            }else{
                Bill::find($idBill)->update(['Status' => $request->Status]);
                $BillHistory = new BillHistory();
                $BillHistory->idBill = $idBill;
                $BillHistory->AdminName = Session::get('AdminName');
                $BillHistory->Status = $request->Status;
                $BillHistory->save();
            } 
            
            return redirect()->back();
        }

        // Hủy đơn hàng
        public function delete_bill($idBill){
            $BillHistory = new BillHistory();
            $BillHistory->idBill = $idBill;
            $BillHistory->AdminName = Session::get('AdminName');
            $BillHistory->Status = 99;
            $BillHistory->save();
            Bill::find($idBill)->update(['Status' => '99']);
            $Bill = Bill::find($idBill);
            if($Bill->Voucher != ''){
                $Voucher = explode("-",$Bill->Voucher);
                $idVoucher = $Voucher[0];
                DB::update('update voucher set VoucherQuantity = VoucherQuantity + 1 where idVoucher = ?',[$idVoucher]);
            } 
            
            $BillInfo = BillInfo::where('idBill',$idBill)->get();
            foreach($BillInfo as $key => $bi){
                DB::update('update product_attribute set Quantity = Quantity + ? where idProAttr = ?',[$bi->QuantityBuy,$bi->idProAttr]);
                DB::update('update product set QuantityTotal = QuantityTotal + ? where idProduct = ?',[$bi->QuantityBuy,$bi->idProduct]);
            }
        }

    /* ---------- End Admin ---------- */

    /* ---------- Shop ---------- */

        // Kiểm tra đăng nhập
        public function checkLogin(){
            $idCustomer = Session::get('idCustomer');
            if($idCustomer == false) return Redirect::to('/home')->send();
        }

        // Hiện tất cả đơn đặt hàng
        public function ordered(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_bill = Bill::where('bill.idCustomer',Session::get('idCustomer'))->orderBy('idBill','desc')->get();
            return view("shop.customer.ordered")->with(compact('list_category','list_brand','list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đang chờ xác nhận
        public function order_waiting(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_bill = Bill::where('bill.idCustomer',Session::get('idCustomer'))->where('Status','0')->get();
            return view("shop.customer.order-waiting")->with(compact('list_category','list_brand','list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đang giao
        public function order_shipping(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_bill = Bill::where('bill.idCustomer',Session::get('idCustomer'))->where('Status','1')->get();
            return view("shop.customer.order-shipping")->with(compact('list_category','list_brand','list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đã giao
        public function order_shipped(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_bill = Bill::where('bill.idCustomer',Session::get('idCustomer'))->where('Status','2')->get();
            return view("shop.customer.order-shipped")->with(compact('list_category','list_brand','list_bill'));
        }

        // Hiện tất cả đơn đặt hàng đã hủy
        public function order_cancelled(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_bill = Bill::where('bill.idCustomer',Session::get('idCustomer'))->where('Status','99')->get();
            return view("shop.customer.order-cancelled")->with(compact('list_category','list_brand','list_bill'));
        }

        // Hiện chi tiết đơn đặt hàng
        public function ordered_info($idBill){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();

            $address = Bill::where('idBill',$idBill)->first();

            $list_bill_info = BillInfo::join('product','product.idProduct','=','billinfo.idProduct')
                ->join('productimage','productimage.idProduct','=','billinfo.idProduct')
                ->where('billinfo.idBill',$idBill)
                ->select('product.ProductName','product.idProduct','product.ProductSlug','productimage.ImageName','billinfo.*')->get();

            return view("shop.customer.ordered-info")->with(compact('list_category','list_brand','address','list_bill_info'));
        }

    /* ---------- End Shop ---------- */
}
