<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Home
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');

//Product
Route::get('/shop-single/{ProductSlug}','ProductController@show_product_details');
Route::get('/store','ProductController@show_all_product');
Route::get('/manage-products','ProductController@manage_products');
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{idProduct}','ProductController@edit_product');
Route::get('/delete-product/{idProduct}','ProductController@delete_product');
Route::post('/submit-add-product','ProductController@submit_add_product');
Route::post('/submit-edit-product/{idProduct}','ProductController@submit_edit_product');
Route::post('/change-status-product/{idProduct}','ProductController@change_status_product');
Route::post('/quick-view-pd','ProductController@quick_view_pd');
Route::post('/modal-compare','ProductController@modal_compare');
Route::post('/modal-compare-search','ProductController@modal_compare_search');
Route::post('/search-suggestions','ProductController@search_suggestions');

//Sale
Route::get('/manage-sale','ProductController@manage_sale');
Route::get('/add-sale','ProductController@add_sale');
Route::get('/edit-sale/{idSale}/{idProduct}','ProductController@edit_sale');
Route::get('/delete-sale/{idSale}','ProductController@delete_sale');
Route::post('/submit-add-sale','ProductController@submit_add_sale');
Route::post('/submit-edit-sale/{idSale}/{idProduct}','ProductController@submit_edit_sale');

//Sale
Route::get('/manage-voucher','ProductController@manage_voucher');
Route::get('/add-voucher','ProductController@add_voucher');
Route::get('/edit-voucher/{idVoucher}','ProductController@edit_voucher');
Route::get('/delete-voucher/{idVoucher}','ProductController@delete_voucher');
Route::post('/submit-add-voucher','ProductController@submit_add_voucher');
Route::post('/submit-edit-voucher/{idVoucher}','ProductController@submit_edit_voucher');

//Cart
Route::get('/cart','CartController@show_cart');
Route::get('/empty-cart','CartController@empty_cart');
Route::get('/success-order','CartController@success_order');
Route::get('/payment','CartController@payment');
Route::delete('/delete-pd-cart/{idCart}','CartController@delete_pd_cart');
Route::get('/delete-cart','CartController@delete_cart');
Route::post('/add-to-cart','CartController@add_to_cart');
Route::post('/buy-now','CartController@buy_now');
Route::post('/update-qty-cart','CartController@update_qty_cart');
Route::post('/check-voucher','CartController@check_voucher');
Route::post('/submit-payment','CartController@submit_payment');

//Bill
Route::get('/ordered','BillController@ordered');
Route::get('/order-waiting','BillController@order_waiting');
Route::get('/order-shipping','BillController@order_shipping');
Route::get('/order-shipped','BillController@order_shipped');
Route::get('/order-cancelled','BillController@order_cancelled');
Route::get('/ordered-info/{idBill}','BillController@ordered_info');

Route::get('/list-bill','BillController@list_bill');
Route::get('/waiting-bill','BillController@waiting_bill');
Route::get('/shipping-bill','BillController@shipping_bill');
Route::get('/shipped-bill','BillController@shipped_bill');
Route::get('/cancelled-bill','BillController@cancelled_bill');
Route::get('/confirmed-bill','BillController@confirmed_bill');
Route::get('/bill-info/{idBill}','BillController@bill_info');
Route::post('/confirm-bill/{idBill}','BillController@confirm_bill');
Route::post('/delete-bill/{idBill}','BillController@delete_bill');

//Customer
Route::get('/account','CustomerController@show_account_info');
Route::get('/login','CustomerController@login');
Route::get('/register','CustomerController@register');
Route::get('/logout','CustomerController@logout');
Route::get('/change-password','CustomerController@change_password');
Route::get('/wishlist','CustomerController@wishlist');
Route::get('/compare','CustomerController@compare');
Route::get('/search','CustomerController@search');
Route::delete('/delete-address/{idAddress}','CustomerController@delete_address');
Route::delete('/delete-wish/{idWish}','CustomerController@delete_wish');
Route::post('/submit-register','CustomerController@submit_register');
Route::post('/submit-login','CustomerController@submit_login');
Route::post('/insert-address','CustomerController@insert_address');
Route::post('/edit-address/{idAddress}','CustomerController@edit_address');
Route::post('/fetch-address','CustomerController@fetch_address');
Route::post('/edit-profile','CustomerController@edit_profile');
Route::post('/submit-change-password','CustomerController@submit_change_password');
Route::post('/add-to-wishlist','CustomerController@add_to_wishlist');
Route::post('/submit-compare','CustomerController@submit_compare');

//Admin
Route::get('/admin','AdminController@show_login');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/admin-logout','AdminController@admin_logout');
Route::get('/my-adprofile','AdminController@my_adprofile');
Route::get('/edit-adprofile','AdminController@edit_adprofile');
Route::get('/change-adpassword','AdminController@change_adpassword');
Route::get('/manage-staffs','AdminController@manage_staffs');
Route::get('/add-staffs','AdminController@add_staffs');
Route::get('/delete-staff/{idAdmin}','AdminController@delete_staff');
Route::get('/delete-customer/{idCustomer}','AdminController@delete_customer');
Route::get('/manage-customers','AdminController@manage_customers');
Route::post('/admin-login','AdminController@admin_login');
Route::post('/submit-edit-adprofile','AdminController@submit_edit_adprofile');
Route::post('/submit-change-adpassword','AdminController@submit_change_adpassword');
Route::post('/submit-add-staffs','AdminController@submit_add_staffs');
Route::post('/statistic-by-date','AdminController@statistic_by_date');
Route::post('/chart-7days','AdminController@chart_7days');
Route::post('/statistic-by-date-order','AdminController@statistic_by_date_order');
Route::post('/topPro-sort-by-date','AdminController@topPro_sort_by_date');

//Brand
Route::get('/manage-brand','BrandController@manage_brand');
Route::get('/add-brand','BrandController@add_brand');
Route::get('/edit-brand/{idBrand}','BrandController@edit_brand');
Route::get('/delete-brand/{idBrand}','BrandController@delete_brand');
Route::post('/submit-add-brand','BrandController@submit_add_brand');
Route::post('/submit-edit-brand/{idBrand}','BrandController@submit_edit_brand');
// Route::post('/fetch-brand','BrandController@fetch_brand');

//Category
Route::get('/manage-category','CategoryController@manage_category');
Route::get('/add-category','CategoryController@add_category');
Route::get('/edit-category/{idCategory}','CategoryController@edit_category');
Route::get('/delete-category/{idCategory}','CategoryController@delete_category');
Route::post('/submit-add-category','CategoryController@submit_add_category');
Route::post('/submit-edit-category/{idCategory}','CategoryController@submit_edit_category');

//Attribute
Route::get('/manage-attribute','AttributeController@manage_attribute');
Route::get('/add-attribute','AttributeController@add_attribute');
Route::get('/edit-attribute/{idAttribute}','AttributeController@edit_attribute');
Route::get('/delete-attribute/{idAttribute}','AttributeController@delete_attribute');
Route::post('/submit-add-attribute','AttributeController@submit_add_attribute');
Route::post('/submit-edit-attribute/{idAttribute}','AttributeController@submit_edit_attribute');
Route::post('/select-attribute','AttributeController@select_attribute');

//AttributeValue
Route::get('/manage-attr-value','AttributeValueController@manage_attr_value');
Route::get('/add-attr-value','AttributeValueController@add_attr_value');
Route::get('/edit-attr-value/{idAttrValue}','AttributeValueController@edit_attr_value');
Route::get('/delete-attr-value/{idAttrValue}','AttributeValueController@delete_attr_value');
Route::post('/submit-add-attr-value','AttributeValueController@submit_add_attr_value');
Route::post('/submit-edit-attr-value/{idAttrValue}','AttributeValueController@submit_edit_attr_value');

//Blog
Route::get('/blog','BlogController@show_blog');
Route::get('/blog/{BlogSlug}','BlogController@blog_details');
Route::get('/manage-blog','BlogController@manage_blog');
Route::get('/add-blog','BlogController@add_blog');
Route::get('/edit-blog/{idBlog}','BlogController@edit_blog');
Route::get('/delete-blog/{idBlog}','BlogController@delete_blog');
Route::post('/submit-add-blog','BlogController@submit_add_blog');
Route::post('/submit-edit-blog/{idBlog}','BlogController@submit_edit_blog');





