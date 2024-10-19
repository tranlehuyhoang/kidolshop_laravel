<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\AddressCustomer;
use App\Models\WishList;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /* ---------- Admin ---------- */
    /* ---------- End Admin ---------- */

    /* ---------- Shop ---------- */

        // Kiểm tra đăng nhập
        public function checkLogin(){
            $idCustomer = Session::get('idCustomer');
            if($idCustomer == false) return Redirect::to('/login')->send();
        }

        // Chuyển đến trang hồ sơ khách hàng
        public function show_account_info(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $customer = Customer::find(Session::get('idCustomer'));
            return view("shop.customer.my-account")->with(compact('list_category','list_brand','customer'));
        }
        
        // Chuyển đến trang đăng nhập
        public function login(){
            $list_category = Category::get();
            $list_brand = Brand::get();
            return view("shop.customer.login")->with(compact('list_category','list_brand'));
        }
        
        // Chuyển đến trang đăng ký
        public function register(){
            $list_category = Category::get();
            $list_brand = Brand::get();
            return view("shop.customer.register")->with(compact('list_category','list_brand'));
        }

        // Chuyển đến trang đổi mật khẩu
        public function change_password(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            return view("shop.customer.change-password")->with(compact('list_category','list_brand'));
        }

        // Chuyển đến trang danh sách yêu thích
        public function wishlist(){
            $this->checkLogin();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $wishlist = WishList::join('product','product.idProduct','=','wishlist.idProduct')
                ->join('productimage','productimage.idProduct','wishlist.idProduct')
                ->where('idCustomer',Session::get('idCustomer'))->get();

            return view("shop.customer.wishlist")->with(compact('list_category','list_brand','wishlist'));
        }

        // Chuyển đến trang so sánh sản phẩm
        public function compare(Request $request){
            $list_category = Category::get();
            $list_brand = Brand::get();
            $products = explode(",",$request->product);
            $list_compare = Product::join('productimage','productimage.idProduct','product.idProduct')
                ->whereIn('product.idProduct', $products)->get();

            return view("shop.customer.compare")->with(compact('list_category','list_brand','list_compare'));
        }

        // Đăng ký tài khoản
        public function submit_register(Request $request){
            $data = $request->all();
            $customer = new Customer();

            $check_customer = Customer::where('username', $data['username'])->first();

            if($check_customer){
                return redirect()->back()->with('error', 'Tài khoản này đã tồn tại');
            }else{
                $customer->username = $data['username'];
                $customer->password = md5($data['password']);
                
                $customer->save();
                return redirect()->back()->with('message', 'Đăng ký tài khoản thành công');
            }
        }

        // Đăng nhập
        public function submit_login(Request $request){
            $data = $request->all();
            $username = $data['username'];
            $password = md5($data['password']);
    
            $login = Customer::where('username', $username)->where('password', $password)->first();
            
            if($login){
                Session::put('idCustomer', $login->idCustomer);
                Session::put('AvatarCus', $login->Avatar);
                return Redirect::to('/home');
            }else{
                return redirect()->back()->with('message', 'Mật khẩu hoặc tài khoản không đúng');
            }
        }

        // Đăng xuất
        public function logout(){
            $this->checkLogin();
            Session::put('idCustomer', null);
            return Redirect::to('/home');
        }

        // Sửa hồ sơ
        public function edit_profile(Request $request){
            $this->checkLogin();
            $data = $request->all();

            $customer = Customer::find(Session::get('idCustomer'));
            $customer->PhoneNumber = $data['PhoneNumber'];
            $customer->CustomerName = $data['CustomerName'];

            if ($request->hasFile('Avatar')){
                $get_image = $request->file('Avatar');
    
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->storeAs('public/kidoldash/images/customer',$new_image);
                $customer->Avatar = $new_image; 
                Session::put('AvatarCus', $new_image);
    
                $get_old_img = Customer::where('idCustomer', Session::get('idCustomer'))->first();
                Storage::delete('public/kidoldash/images/customer/'.$get_old_img->Avatar);
            }

            $customer->save();
        }

        // Đổi mật khẩu
        public function submit_change_password(Request $request){
            $this->checkLogin();
            $data = $request->all();

            $customer = Customer::find(Session::get('idCustomer'));

            if($customer->password == md5($data['password'])){
                $customer->password = md5($data['newpassword']);
                $customer->save();
                echo $output = 'Đổi mật khẩu thành công';
            }else echo $output = 'Nhập mật khẩu cũ không đúng';
        }

        // Thêm địa chỉ nhận hàng
        public function insert_address(Request $request){
            $this->checkLogin();
            $data = $request->all();

            $address = new AddressCustomer();
            $address->idCustomer = Session::get('idCustomer');
            $address->Address = $data['Address'];
            $address->CustomerName = $data['CustomerName'];
            $address->PhoneNumber = $data['PhoneNumber'];

            $address->save();
        }

        // Sửa địa chỉ nhận hàng
        public function edit_address(Request $request, $idAddress){
            $this->checkLogin();
            $data = $request->all();

            $address = AddressCustomer::find($idAddress);
            $address->idCustomer = Session::get('idCustomer');
            $address->Address = $data['Address'];
            $address->CustomerName = $data['CustomerName'];
            $address->PhoneNumber = $data['PhoneNumber'];

            $address->save();
        }

        // Hiện danh sách địa chỉ nhận hàng
        public function fetch_address(){
            $list_address = AddressCustomer::where('idCustomer', Session::get('idCustomer'))->get();
            $output = '';

            foreach($list_address as $key => $address){
                $output .= '<li class="cus-radio align-items-center justify-content-between">
                                <input type="radio" name="address_rdo" value="'.$address->idAddress.'" id="radio'.$address->idAddress.'" checked>
                                <label for="radio'.$address->idAddress.'">
                                    <span>'.$address->CustomerName.'</span>
                                    <span>'.$address->PhoneNumber.'</span>
                                    <span>'.$address->Address.'</span>
                                </label>
                                <div>
                                    <button type="button" data-toggle="modal" data-target="#EditAddressModal" class="edit-address btn btn-outline-primary" data-id="'.$address->idAddress.'" data-name="'.$address->CustomerName.'" data-phone="'.$address->PhoneNumber.'" data-address="'.$address->Address.'">Sửa</button>
                                    <button type="button" class="dlt-address btn btn-outline-primary ml-2" data-id="'.$address->idAddress.'">Xóa</button>
                                </div>     
                            </li>';
            }
            echo $output;
        }

        // Xóa địa chỉ nhận hàng
        public function delete_address($idAddress){
            $this->checkLogin();
            AddressCustomer::destroy($idAddress);
        }

        // Thêm vào danh sách yêu thích
        public function add_to_wishlist(Request $request){
            $this->checkLogin();
            $data = $request->all();

            $select_product = WishList::where('idProduct',$data['idProduct'])->where('idCustomer',Session::get('idCustomer'))->get();

            if($select_product->count() == 0){
                $wishlist = new WishList();
                $wishlist->idCustomer = Session::get('idCustomer');
                $wishlist->idProduct = $data['idProduct'];
                $wishlist->save();
            }
        }

        // Xóa sản phẩm yêu thích
        public function delete_wish($idWish){
            $this->checkLogin();
            WishList::destroy($idWish);
        }

        // Tìm kiếm sản phẩm
        public function search(){
            $keyword = $_GET['keyword'];
            $sub30days = Carbon::now()->subDays(30)->toDateString();

            $list_category = Category::get();
            $list_brand = Brand::get();
            
            $list_pd_query = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                ->join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')
                ->where('StatusPro','1')
                ->whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($keyword))
                ->select('ImageName','product.*');

            if($list_pd_query->count() < 1){
                $list_pd_query = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                    ->join('brand','brand.idBrand','=','product.idBrand')
                    ->join('category','category.idCategory','=','product.idCategory')
                    ->where('StatusPro','1')
                    ->select('ImageName','product.*','BrandName','CategoryName');
                $list_pd_query->where(function ($list_pd_query) use ($keyword){
                    $list_pd_query->orWhere('BrandName','like','%'.$keyword.'%')->orWhere('CategoryName','like','%'.$keyword.'%'); 
                });
            }

            //whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($keyword)) //
            // $list_pd_query = Product::whereRaw("MATCH (ProductName) AGAINST (? IN BOOLEAN MODE)", Product::fullTextWildcards($keyword));

            if(isset($_GET['brand'])) $brand_arr = explode(",",$_GET['brand']);
            if(isset($_GET['category'])) $category_arr = explode(",",$_GET['category']);

            if(isset($_GET['category']) && isset($_GET['brand']))
            {
                $list_pd_query->whereIn('product.idCategory',$category_arr)->whereIn('product.idBrand',$brand_arr);
            }
            else if(isset($_GET['brand']))
            {
                $list_pd_query->whereIn('product.idBrand',$brand_arr);
            }
            else if(isset($_GET['category']))
            {
                $list_pd_query->whereIn('product.idCategory',$category_arr);
            }

            if(isset($_GET['priceMin']) && isset($_GET['priceMax'])){
                $list_pd_query->whereBetween('Price',[$_GET['priceMin'],$_GET['priceMax']]);
            }else if(isset($_GET['priceMin'])){
                $list_pd_query->whereRaw('Price >= ?',$_GET['priceMin']);
            }else if(isset($_GET['priceMax'])){
                $list_pd_query->whereRaw('Price <= ?',$_GET['priceMax']);
            }
            
            if(isset($_GET['sort_by'])){
                if($_GET['sort_by'] == 'new') $list_pd_query->orderBy('created_at','desc');
                else if($_GET['sort_by'] == 'old') $list_pd_query->orderBy('created_at','asc');
                else if($_GET['sort_by'] == 'bestsellers') $list_pd_query->orderBy('Sold','desc');
                else if($_GET['sort_by'] == 'featured') $list_pd_query->whereBetween('product.created_at',[$sub30days,now()])->orderBy('Sold','desc');
                else if($_GET['sort_by'] == 'sale') $list_pd_query->join('saleproduct','saleproduct.idProduct','=','product.idProduct')->whereRaw('SaleStart < NOW()')->whereRaw('SaleEnd > NOW()')->orderBy('created_at','desc');
                else if($_GET['sort_by'] == 'price_desc') $list_pd_query->orderBy('Price','desc');
                else if($_GET['sort_by'] == 'price_asc') $list_pd_query->orderBy('Price','asc');
            }
            
            $count_pd = $list_pd_query->count();
                        
            $list_pd = $list_pd_query->paginate(15);

            $top_bestsellers_pd = Product::join('productimage','productimage.idProduct','=','product.idProduct')->orderBy('Sold','DESC')->limit(3)->get();

            return view("shop.search")->with(compact('list_category','list_brand','list_pd','count_pd','keyword','top_bestsellers_pd'));
        }

        // Đếm số sản phẩm theo danh mục thuộc từ khóa tìm kiếm
        public static function count_cat_search($idCategory){
            $keyword = $_GET['keyword'];

            $query_cat = Product::join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')->where('StatusPro','1')
                ->where('product.idCategory',$idCategory)
                ->whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($keyword))
                ->select('idProduct');

            if($query_cat->count() < 1){
                $query_cat = Product::join('brand','brand.idBrand','=','product.idBrand')
                    ->join('category','category.idCategory','=','product.idCategory')->where('StatusPro','1')
                    ->where('product.idCategory',$idCategory)->select('idProduct','BrandName','CategoryName');
                $query_cat->where(function ($query_cat) use ($keyword){
                    $query_cat->orWhere('BrandName','like','%'.$keyword.'%')->orWhere('CategoryName','like','%'.$keyword.'%'); 
                });
            }

            $count_cat = $query_cat->count();
            return $count_cat;
        }

        // Đếm số sản phẩm theo thương hiệu thuộc từ khóa tìm kiếm
        public static function count_brand_search($idBrand){
            $keyword = $_GET['keyword'];

            $query_brand = Product::join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')->where('StatusPro','1')
                ->where('product.idBrand',$idBrand)
                ->whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($keyword))
                ->select('idProduct');

            if($query_brand->count() < 1){
                $query_brand = Product::join('brand','brand.idBrand','=','product.idBrand')
                    ->join('category','category.idCategory','=','product.idCategory')->where('StatusPro','1')
                    ->where('product.idBrand',$idBrand)->select('idProduct','BrandName','CategoryName');
                $query_brand->where(function ($query_brand) use ($keyword){
                    $query_brand->orWhere('BrandName','like','%'.$keyword.'%')->orWhere('CategoryName','like','%'.$keyword.'%'); 
                });
            }

            $count_brand = $query_brand->count();

            return $count_brand;
        }

    /* ---------- End Shop ---------- */
    
}
