<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SaleProduct;
use App\Models\Attribute;
use App\Models\AttributeValue   ;
use App\Models\ProductAttriBute;
use App\Models\Voucher;
use App\Models\WishList;
use App\Models\Viewer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use PDO;

class ProductController extends Controller
{
    /* ---------- Admin ---------- */

        // Chuyển đến trang quản lý sản phẩm
        public function manage_products(){
            $list_product = Product::join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')
                ->join('productimage','productimage.idProduct','=','product.idProduct')->get();
            $count_product = Product::count();

            return view("admin.product.manage-products")->with(compact('list_product','count_product'));
        }

        // Chuyển đến trang thêm sản phẩm
        public function add_product(){
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_attribute = Attribute::get();
            // $list_attribute_val = AttributeValue::join('attribute','attribute_value.idAttribute','=','attribute.idAttribute')->get();
            return view("admin.product.add-product")->with(compact('list_category','list_brand','list_attribute'));
        }

        // Chuyển đến trang sửa sản phẩm
        public function edit_product($idProduct){
            $product = Product::join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')
                ->join('productimage','productimage.idProduct','=','product.idProduct')
                ->where('product.idProduct',$idProduct)->first();

            $list_pd_attr = ProductAttriBute::join('attribute_value','attribute_value.idAttrValue','=','product_attribute.idAttrValue')
                ->join('attribute','attribute.idAttribute','=','attribute_value.idAttribute')
                ->where('product_attribute.idProduct', $idProduct)->get();

            $name_attribute = ProductAttriBute::join('attribute_value','attribute_value.idAttrValue','=','product_attribute.idAttrValue')
                ->join('attribute','attribute.idAttribute','=','attribute_value.idAttribute')
                ->where('product_attribute.idProduct', $idProduct)->first();
            
            $list_attribute = Attribute::get();
            $list_category = Category::get();
            $list_brand = Brand::get();

            return view("admin.product.edit-product")->with(compact('product','list_category','list_brand','list_attribute','list_pd_attr','name_attribute'));
        }

        // Chuyển đến trang quản lý khuyến mãi
        public function manage_sale(){
            $list_sale = SaleProduct::join('product','product.idProduct','=','saleproduct.idProduct')
                ->join('productimage','productimage.idProduct','=','product.idProduct')->get();

            $count_sale = SaleProduct::count();
            return view("admin.product.sale.manage-sale")->with(compact('list_sale','count_sale'));
        }

        // Chuyển đến trang thêm khuyến mãi
        public function add_sale(){
            $list_product = Product::join('productimage','productimage.idProduct','=','product.idProduct')->get();
            return view("admin.product.sale.add-sale")->with(compact('list_product'));
        }

        // Chuyển đến trang sửa khuyến mãi
        public function edit_sale($idSale, $idProduct){
            $sale_product = SaleProduct::join('product','product.idProduct','=','saleproduct.idProduct')
                ->join('productimage','productimage.idProduct','=','product.idProduct')->where('idSale',$idSale)->first();
            
            return view("admin.product.sale.edit-sale")->with(compact('sale_product'));
        }

        // Chuyển đến trang quản lý mã giảm giá
        public function manage_voucher(){
            $list_voucher = Voucher::whereNotIn('idVoucher',[0])->get();
            $count_voucher = Voucher::whereNotIn('idVoucher',[0])->count();
            return view("admin.product.voucher.manage-voucher")->with(compact('list_voucher','count_voucher'));
        }

        // Chuyển đến trang thêm mã giảm giá
        public function add_voucher(){
            return view("admin.product.voucher.add-voucher");
        }

        // Chuyển đến trang sửa mã giảm giá
        public function edit_voucher($idVoucher){
            $voucher = Voucher::find($idVoucher);
            return view("admin.product.voucher.edit-voucher")->with(compact('voucher'));
        }

        // Thêm sản phẩm
        public function submit_add_product(Request $request){
            $data = $request->all();

            $select_product = Product::where('ProductSlug', $data['ProductSlug'])->first();

            if($select_product){
                return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại');
            }else{
                $product = new Product();
                $product_image = new ProductImage();
                $product->ProductName = $data['ProductName'];
                $product->idCategory = $data['idCategory'];
                $product->idBrand = $data['idBrand'];
                $product->Price = $data['Price'];
                $product->QuantityTotal = $data['QuantityTotal'];
                $product->ShortDes = $data['ShortDes'];
                $product->DesProduct = $data['DesProduct'];
                $product->ProductSlug = $data['ProductSlug'];
                $get_image = $request->file('ImageName');
                $timestamp = now();
                
                $product->save();
                $get_pd = Product::where('created_at',$timestamp)->first();

                // Thêm phân loại vào Product_Attribute
                if($request->qty_attr){
                    foreach($data['qty_attr'] as $key => $qty_attr)
                    {
                        $data_all = array(
                            'idProduct' => $get_pd->idProduct,
                            'idAttrValue' => $data['chk_attr'][$key],
                            'Quantity' => $qty_attr,
                            'created_at' => now(),
                            'updated_at' => now()
                        );
                        ProductAttriBute::insert($data_all);
                    }
                }else{
                    $data_all = array(
                        'idProduct' => $get_pd->idProduct,
                        'Quantity' => $data['QuantityTotal'],
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    ProductAttriBute::insert($data_all);
                }

                // Thêm hình ảnh vào table ProductImage
                foreach($get_image as $image){
                    $get_name_image = $image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                    $image->storeAs('public/kidoldash/images/product',$new_image);
                    $images[] = $new_image;
                }

                $product_image->ImageName=json_encode($images);
                $product_image->idProduct= $get_pd->idProduct;
                $product_image->save();
                return redirect()->back()->with('message', 'Thêm sản phẩm thành công');
            }
        }

        // Sửa sản phẩm
        public function submit_edit_product(Request $request, $idProduct){
            $data = $request->all();
            $product = Product::find($idProduct);

            $select_product = Product::where('ProductSlug', $data['ProductSlug'])->whereNotIn('idProduct',[$idProduct])->first();

            if($select_product){
                return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại');
            }else{
                $product_image = new ProductImage();
                $product->ProductName = $data['ProductName'];
                $product->idCategory = $data['idCategory'];
                $product->idBrand = $data['idBrand'];
                $product->Price = $data['Price'];
                $product->QuantityTotal = $data['QuantityTotal'];
                $product->ShortDes = $data['ShortDes'];
                $product->DesProduct = $data['DesProduct'];
                $product->ProductSlug = $data['ProductSlug'];

                // Sửa phân loại Product_Attribute
                if($request->qty_attr){
                    ProductAttriBute::where('idProduct',$idProduct)->delete();
                    foreach($data['qty_attr'] as $key => $qty_attr)
                    {
                        $data_all = array(
                            'idProduct' => $idProduct,
                            'idAttrValue' => $data['chk_attr'][$key],
                            'Quantity' => $qty_attr,
                            'created_at' => now(),
                            'updated_at' => now()
                        );
                        ProductAttriBute::insert($data_all);
                    }
                }else{
                    ProductAttriBute::where('idProduct',$idProduct)->delete();
                    $data_all = array(
                        'idProduct' => $idProduct,
                        'Quantity' => $data['QuantityTotal'],
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    ProductAttriBute::insert($data_all);
                }
                
                // Thêm hình ảnh vào table ProductImage
                if($request->file('ImageName')){
                    $get_image = $request->file('ImageName');

                    foreach($get_image as $image){
                        $get_name_image = $image->getClientOriginalName();
                        $name_image = current(explode('.',$get_name_image));
                        $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                        $image->storeAs('public/kidoldash/images/product',$new_image);
                        $images[] = $new_image;
                    }

                    // Xoá hình cũ trong csdl và trong folder 
                    $get_old_mg = ProductImage::where('idProduct', $idProduct)->first();
                    foreach(json_decode($get_old_mg->ImageName) as $old_img){
                        Storage::delete('public/kidoldash/images/product/'.$old_img);
                    }
                    ProductImage::where('idProduct', $idProduct)->delete();
                    
                    $product_image->ImageName=json_encode($images);
                    $product_image->idProduct = $idProduct;
                    $product_image->save();
                }
                $product->save();
                return redirect()->back()->with('message', 'Sửa sản phẩm thành công');
            }
        }

        // Xóa sản phẩm
        public function delete_product($idProduct){
            $get_old_mg = ProductImage::where('idProduct', $idProduct)->first();
            foreach(json_decode($get_old_mg->ImageName) as $old_img){
                Storage::delete('public/kidoldash/images/product/'.$old_img);
            }
            Product::find($idProduct)->delete();
            return redirect()->back();
        }

        // Ẩn / Hiện sản phẩm
        public function change_status_product(Request $request, $idProduct){
            $data = $request->all();

            $product = Product::find($idProduct);
            $product->StatusPro = $data['StatusPro'];
            $product->save();
        }

        // Thêm khuyến mãi
        public function submit_add_sale(Request $request){
            $data = $request->all();

            foreach($data['chk_product'] as $chk_product){
                $check_time_sale = SaleProduct::join('product','product.idProduct','=','saleproduct.idProduct')
                ->where('saleproduct.idProduct', $chk_product)->orderBy('SaleEnd', 'desc')->first();

                if($check_time_sale && $check_time_sale['SaleEnd'] >= $data['SaleStart']){
                    return redirect()->back()->with('error', 'Thêm khuyến mãi thất bại, sản phẩm '.$check_time_sale['ProductName'].' đã có khuyến mãi trong thời gian trên.<br>Vui lòng thêm khuyến mãi sau ngày '.$check_time_sale['SaleEnd'].'.');
                }else{
                    $data_all = array(
                        'SaleName' => $data['SaleName'],
                        'SaleStart' => $data['SaleStart'],
                        'SaleEnd' => $data['SaleEnd'],
                        'Percent' => $data['Percent'],
                        'idProduct' => $chk_product,
                        'created_at' => now(),
                        'updated_at' => now()
                    );
                    SaleProduct::insert($data_all);
                }
            }
            return redirect()->back()->with('message', 'Thêm khuyến mãi thành công');
        }

        // Sửa khuyến mãi
        public function submit_edit_sale(Request $request, $idSale, $idProduct){
            $saleproduct = SaleProduct::find($idSale);
            $data = $request->all();
            $saleproduct->SaleName = $data['SaleName'];
            $saleproduct->SaleStart = $data['SaleStart'];
            $saleproduct->SaleEnd = $data['SaleEnd'];
            $saleproduct->Percent = $data['Percent'];

            $count_check = SaleProduct::where('idProduct',$idProduct)->whereNotIn('idSale',[$idSale])->count();

            if($count_check >= 1){
                $check_time_sale = SaleProduct::join('product','product.idProduct','=','saleproduct.idProduct')
                ->where('saleproduct.idProduct',$idProduct)->whereNotIn('idSale',[$idSale])->get();
            
                foreach($check_time_sale as $check){
                    if(($check['SaleStart'] <= $data['SaleStart'] && $data['SaleStart'] <= $check['SaleEnd']) || ($check['SaleStart'] <= $data['SaleEnd'] && $data['SaleEnd'] <= $check['SaleEnd'])){
                        return redirect()->back()->with('error', 'Sửa khuyến mãi thất bại, sản phẩm này đã có khuyến mãi trong thời gian '.$check['SaleStart'].' đến '.$check['SaleEnd'].'.');
                    }else if(($data['SaleStart'] <= $check['SaleStart'] && $check['SaleStart'] <= $data['SaleEnd']) || ($data['SaleStart'] <= $check['SaleEnd'] && $check['SaleEnd'] <= $data['SaleEnd'])){
                        return redirect()->back()->with('error', 'Sửa khuyến mãi thất bại, sản phẩm này đã có khuyến mãi trong thời gian '.$check['SaleStart'].' đến '.$check['SaleEnd'].'.');
                    }
                }
            }
            $saleproduct->save();
            return redirect()->back()->with('message', 'Sửa khuyến mãi thành công');
        }

        // Xóa khuyến mãi
        public function delete_sale($idSale){
            SaleProduct::find($idSale)->delete();
            return redirect()->back();
        }

        // Thêm mã giảm giá
        public function submit_add_voucher(Request $request){
            $data = $request->all();

            $select_voucher = Voucher::where('VoucherCode', $data['VoucherCode'])->first();

            if($select_voucher){
                return redirect()->back()->with('error', 'Mã giảm giá này đã tồn tại');
            }else{
                $voucher = new Voucher();
                $voucher->VoucherName = $data['VoucherName'];
                $voucher->VoucherQuantity = $data['VoucherQuantity'];
                $voucher->VoucherCondition = $data['VoucherCondition'];
                $voucher->VoucherNumber = $data['VoucherNumber'];
                $voucher->VoucherCode = $data['VoucherCode'];
                $voucher->VoucherStart = $data['VoucherStart'];
                $voucher->VoucherEnd = $data['VoucherEnd'];
                $voucher->save();

                return redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        }

        // Sửa mã giảm giá
        public function submit_edit_voucher(Request $request, $idVoucher){
            $data = $request->all();

            $select_voucher = Voucher::where('VoucherCode', $data['VoucherCode'])->whereNotIn('idVoucher',[$idVoucher])->first();

            if($select_voucher){
                return redirect()->back()->with('error', 'Mã giảm giá này đã tồn tại');
            }else{
                $voucher = Voucher::find($idVoucher);
                $voucher->VoucherName = $data['VoucherName'];
                $voucher->VoucherQuantity = $data['VoucherQuantity'];
                $voucher->VoucherCondition = $data['VoucherCondition'];
                $voucher->VoucherNumber = $data['VoucherNumber'];
                $voucher->VoucherCode = $data['VoucherCode'];
                $voucher->VoucherStart = $data['VoucherStart'];
                $voucher->VoucherEnd = $data['VoucherEnd'];
                $voucher->save();

                return redirect()->back()->with('message', 'Sửa mã giảm giá thành công');
            }
        }

        // Xóa khuyến mãi
        public function delete_voucher($idVoucher){
            Voucher::destroy($idVoucher);
            return redirect()->back();
        }

    /* ---------- End Admin ---------- */

    /* ---------- Shop ---------- */
    
        // Chuyển đến trang chi tiết sản phẩm
        public function show_product_details($ProductSlug){
            $list_category = Category::get();
            $list_brand = Brand::get();

            $this_pro = Product::where('ProductSlug',$ProductSlug)->first();
            
            if($this_pro->StatusPro != '0'){
                $viewer = new Viewer();
                
                if(Session::get('idCustomer') == '') $idCustomer = session()->getId();
                else $idCustomer = (string)Session::get('idCustomer');
                
                $viewer->idCustomer = $idCustomer;
                $viewer->idProduct = $this_pro->idProduct;
                
                if(Viewer::where('idCustomer',$idCustomer)->where('idProduct',$this_pro->idProduct)->count() == 0){
                    if(Viewer::where('idCustomer',$idCustomer)->count() >= 3){
                        $idView = Viewer::where('idCustomer',$idCustomer)->orderBy('idView','asc')->take(1)->delete();
                        $viewer->save();
                    }else $viewer->save();
                }

                $idBrand = $this_pro->idBrand;
                $idCategory = $this_pro->idCategory;
                $count_wish = WishList::where('idProduct',$this_pro->idProduct)->count();
    
                $list_pd_attr = ProductAttriBute::join('attribute_value','attribute_value.idAttrValue','=','product_attribute.idAttrValue')
                    ->join('attribute','attribute.idAttribute','=','attribute_value.idAttribute')
                    ->where('product_attribute.idProduct', $this_pro->idProduct)->get();
    
                $name_attribute = ProductAttriBute::join('attribute_value','attribute_value.idAttrValue','=','product_attribute.idAttrValue')
                    ->join('attribute','attribute.idAttribute','=','attribute_value.idAttribute')
                    ->where('product_attribute.idProduct', $this_pro->idProduct)->first();
    
                $product = Product::join('productimage','productimage.idProduct','=','product.idProduct')->where('product.idProduct',$this_pro->idProduct)->first();

                $list_related_products = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                    ->whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($this_pro->ProductName))
                    ->whereNotIn('product.idProduct',[$this_pro->idProduct])->where('StatusPro','1')
                    ->select('ImageName','product.*');

                $list_related_products->where(function ($list_related_products) use ($idBrand, $idCategory){
                    $list_related_products->orWhere('idBrand',$idBrand)->orWhere('idCategory',$idCategory);
                });
                
                $list_related_product = $list_related_products->get();

                return view("shop.product.shop-single")->with(compact('list_category','list_brand','product','list_pd_attr','name_attribute','count_wish','list_related_product'));
            }else return Redirect::to('home')->send();
        }

        // Chuyển dến trang cửa hàng
        public function show_all_product(){
            $sub30days = Carbon::now()->subDays(30)->toDateString();
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_pd_query = Product::join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')
                ->join('productimage','productimage.idProduct','=','product.idProduct')->where('StatusPro','1')
                ->select('ImageName','product.*','BrandName','CategoryName');

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
            }else $list_pd_query->orderBy('created_at','desc');
            
            $count_pd = $list_pd_query->count();
            $list_pd = $list_pd_query->paginate(15);

            $top_bestsellers_pd = Product::join('productimage','productimage.idProduct','=','product.idProduct')->orderBy('Sold','DESC')->limit(3)->get();

            return view("shop.product.shop-all-product")->with(compact('list_category','list_brand','list_pd','count_pd','top_bestsellers_pd'));
        }

        // Hiện modal quick view sản phẩm
        public function quick_view_pd(Request $request){
            if($request->ajax())
            {
                $data = $request->all();
                $output = '';
                $product = Product::join('productimage','productimage.idProduct','=','product.idProduct')->where('product.idProduct',$data['idProduct'])->first();

                $sale_pd = SaleProduct::where('idProduct',$data['idProduct'])->whereRaw('SaleStart < NOW()')->whereRaw('SaleEnd > NOW()')->first();
                $SalePrice = 0;
                if($sale_pd) $SalePrice = $product->Price - ($product->Price/100) * $sale_pd->Percent;

                $image = json_decode($product->ImageName)[0];

                $output .= '
                    <div class="modal fade" id="modal-pd-'.$data['idProduct'].'">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="quick-view-image">
                                                <img src="public/storage/kidoldash/images/product/'.$image.'" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="quick-view-content">
                                                <h4 class="product-title">'.$product->ProductName.'</h4>';

                                    $output .= '<div class="thumb-price">';
                                    if($SalePrice != '0'){
                                        $output .= '<span class="current-price">'.number_format($product->Price,0,',','.').'đ</span>
                                                    <span class="old-price">'.number_format(round($SalePrice,-3),0,',','.').'đ</span>
                                                    <span class="discount">-'.$sale_pd->Percent.'%</span>
                                                </div>';
                                    }else{
                                        $output .= '<span class="current-price">'.number_format($product->Price,0,',','.').'đ</span>
                                                </div>';
                                    }          
                
                                    $output .=' <div>'.$product->ShortDes.'</div>
                                                <div class="mt-3">
                                                    <a href="shop-single/'.$product->ProductSlug.'" class="btn btn-primary">Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo $output;
        }

        // Lấy thời gian khuyến mãi của 1 sản phẩm
        public static function get_sale_pd($idProduct){
            $get_sale_pd = SaleProduct::where('idProduct',$idProduct)->whereRaw('SaleStart < NOW()')->whereRaw('SaleEnd > NOW()')->first();
            return $get_sale_pd;
        }

        // Hiện modal so sánh sản phẩm
        public function modal_compare(Request $request){
            $data = $request->all();
            $output = '';

            $get_pd = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                ->where('StatusPro','1')->where('idCategory',$data['idCategory'])
                ->whereNotIn('product.idProduct',[$data['idProduct']])->get();
            
            $output .= '
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header justify-content-start">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Chọn sản phẩm</h5>
                                <input type="text" id="search-pd-compare" placeholder="Tìm kiếm sản phẩm" style="width:65%; margin-left:10%;">
                            </div>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" aria-hidden="true"></button>
                            <div class="modal-body modal-compare-body row">';
                            foreach($get_pd as $key => $pd){
                                $sale_pd = SaleProduct::where('idProduct',$pd->idProduct)->whereRaw('SaleStart < NOW()')->whereRaw('SaleEnd > NOW()')->first();
                                $SalePrice = $pd->Price;
                                if($sale_pd) $SalePrice = $pd->Price - ($pd->Price/100) * $sale_pd->Percent;
                                $image = json_decode($pd->ImageName)[0];
            $output .= '    <div class="product-item col-md-3 select-pd" id="product-item-'.$pd->idProduct.'" data-id="'.$pd->idProduct.'">
                                <div class="product-image-compare mb-3" id="product-image-'.$pd->idProduct.'">
                                    <label for="chk-pd-'.$pd->idProduct.'"><img src="public/storage/kidoldash/images/product/'.$image.'" class="rounded w-100 img-fluid"></label>       
                                    <div class="product-title-compare">
                                        <div class="product-name-compare text-center">
                                            <input type="checkbox" class="checkstatus d-none" id="chk-pd-'.$pd->idProduct.'" name="chk_product[]" value="'.$pd->idProduct.'" data-id="'.$pd->idProduct.'">
                                            <span>'.$pd->ProductName.'</span>
                                        </div>
                                        <div style="text-align:center;">'.number_format(round($SalePrice,-3),0,',','.').'đ</div>
                                    </div>
                                </div>
                                <input type="hidden" name="selected_product[]" id="product-'.$pd->idProduct.'" value="">
                            </div>';
                            }
                            
            $output .= '    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-round" style="color:#000; border: 1px solid #e6e6e6;" data-dismiss="modal">Đóng</button>
                                <button type="button" id="confirm" class="btn btn-primary btn-round btn-compare" data-dismiss="modal" style="pointer-events: none; background-color: rgb(108, 117, 125); border:none;">Xác nhận</button>
                            </div>
                        </div>
                    </div>';
            echo $output;
        }

        // Tìm kiếm sản phẩm so sánh
        public function modal_compare_search(Request $request){
            $data = $request->all();
            $value = $data['value'];
            $output = '';

            $pds = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                ->join('brand','brand.idBrand','=','product.idBrand')
                ->where('StatusPro','1')->where('idCategory',$data['idCategory'])
                ->whereNotIn('product.idProduct',[$data['idProduct']])
                ->select('ImageName','product.*','BrandName');
                $pds->where(function ($pds) use ($value){
                    $pds->whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($value));
                });
                
            $get_pd = $pds->get();
                
            foreach($get_pd as $key => $pd){
                $sale_pd = SaleProduct::where('idProduct',$pd->idProduct)->whereRaw('SaleStart < NOW()')->whereRaw('SaleEnd > NOW()')->first();
                $SalePrice = $pd->Price;
                if($sale_pd) $SalePrice = $pd->Price - ($pd->Price/100) * $sale_pd->Percent;
                $image = json_decode($pd->ImageName)[0];
            $output .= '<div class="product-item col-md-3 select-pd" id="product-item-'.$pd->idProduct.'" data-id="'.$pd->idProduct.'">
                            <div class="product-image-compare mb-3" id="product-image-'.$pd->idProduct.'">
                                <label for="chk-pd-'.$pd->idProduct.'"><img src="/public/storage/kidoldash/images/product/'.$image.'" class="rounded w-100 img-fluid"></label>       
                                <div class="product-title-compare">
                                    <div class="product-name-compare text-center">
                                        <input type="checkbox" class="checkstatus d-none" id="chk-pd-'.$pd->idProduct.'" name="chk_product[]" value="'.$pd->idProduct.'" data-id="'.$pd->idProduct.'">
                                        <span>'.$pd->ProductName.'</span>
                                    </div>
                                    <div style="text-align:center;">'.number_format(round($SalePrice,-3),0,',','.').'đ</div>
                                </div>
                            </div>
                            <input type="hidden" name="selected_product[]" id="product-'.$pd->idProduct.'" value="">
                        </div>';
            }
            echo $output;
        }

        // Gợi ý tìm kiếm sản phẩm
        public function search_suggestions(Request $request){
            $value = $request->value;

            $output = '';
            
            $get_cat = Category::select('CategoryName')->where('CategoryName','like','%'.$value.'%')->limit(3)->get(); 

            $get_brand = Brand::select('BrandName')->where('BrandName','like','%'.$value.'%')->limit(3)->get(); 

            $pds = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                ->join('brand','brand.idBrand','=','product.idBrand')
                ->join('category','category.idCategory','=','product.idCategory')
                ->where('StatusPro','1')
                ->whereRaw("MATCH (ProductName) AGAINST (?)", Product::fullTextWildcards($value))
                ->select('ImageName','ProductName','ProductSlug');

            if($pds->count() < 1){
                $pds = Product::join('productimage','productimage.idProduct','=','product.idProduct')
                    ->join('brand','brand.idBrand','=','product.idBrand')
                    ->join('category','category.idCategory','=','product.idCategory')
                    ->where('StatusPro','1')
                    ->select('ImageName','ProductName','BrandName','CategoryName','ProductSlug');
                $pds->where(function ($pds) use ($value){
                    $pds->orWhere('BrandName','like','%'.$value.'%')->orWhere('CategoryName','like','%'.$value.'%');
                });
            }

            $get_pd = $pds->limit(3)->get();

            if($get_cat->count() > 0){
                $output .= '<h5 class="p-1">Danh mục</h5>';
                foreach($get_cat as $cat){
                    $output .='
                    <li class="search-product-item">
                        <a class="search-product-text one-line" href="search?keyword='.$cat->CategoryName.'">'.$cat->CategoryName.'</a>
                    </li>';
                }
            }

            if($get_brand->count() > 0){
                $output .= '<h5 class="p-1">Thương hiệu</h5>';
                foreach($get_brand as $brand){
                    $output .='
                    <li class="search-product-item">
                        <a class="search-product-text one-line" href="search?keyword='.$brand->BrandName.'">'.$brand->BrandName.'</a>
                    </li>';
                }
            }

            if($get_pd->count() > 0){
                $output .= '<h5 class="p-1">Sản phẩm</h5>';
                foreach($get_pd as $pd){
                    $image = json_decode($pd->ImageName)[0];
                    $output .='
                    <li class="search-product-item d-flex align-items-center">
                        <a class="search-product-text" href="/../kidolshop/shop-single/'.$pd->ProductSlug.'">
                            <div class="d-flex align-items-center">
                                <img width="50" height="50" src="/../kidolshop/public/storage/kidoldash/images/product/'.$image.'" alt="">
                                <span class="two-line ml-2">'.$pd->ProductName.'</span>
                            </div>
                        </a>
                    </li>';
                }
            }
            echo $output;
        }

    /* ---------- End Shop ---------- */
}
