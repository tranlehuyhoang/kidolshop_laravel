<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Brand;


class BrandController extends Controller
{
    /* ---------- Admin ---------- */

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

        // Chuyển đến trang quản lý thương hiệu
        public function manage_brand(){
            $this->checkLogin();
            $this->checkPostion();
            $list_brand = Brand::get();
            $count_brand = Brand::count();
            return view("admin.brand.manage-brand")->with(compact('list_brand', 'count_brand'));
        }

        // Chuyển đến trang thêm thương hiệu
        public function add_brand(){
            $this->checkLogin();
            $this->checkPostion();
            return view("admin.brand.add-brand");
        }

        // Chuyển đến trang sửa thương hiệu
        public function edit_brand($idBrand){
            $this->checkLogin();
            $this->checkPostion();
            $select_brand = Brand::where('idBrand', $idBrand)->first();
            return view("admin.brand.edit-brand")->with(compact('select_brand'));
        }

        // Thêm thương hiệu
        public function submit_add_brand(Request $request){
            $data = $request->all();
            $brand = new Brand();
            
            $select_brand = Brand::where('BrandName', $data['BrandName'])->first();

            if($select_brand){
                return Redirect::to('add-brand')->with('error', 'Tên thương hiệu này đã tồn tại');
            }else{
                $brand->BrandName = $data['BrandName'];
                $brand->BrandSlug = $data['BrandSlug'];
                $brand->save();
                return Redirect::to('add-brand')->with('message', 'Thêm thương hiệu thành công');
            }
        }

        // Sửa thương hiệu
        public function submit_edit_brand(Request $request, $idBrand){
            $data = $request->all();
            $brand = Brand::find($idBrand);
            
            $select_brand = Brand::where('BrandName', $data['BrandName'])->whereNotIn('idBrand',[$idBrand])->first();

            if($select_brand){
                return redirect()->back()->with('error', 'Tên thương hiệu này đã tồn tại');
            }else{
                $brand->BrandName = $data['BrandName'];
                $brand->BrandSlug = $data['BrandSlug'];
                $brand->save();
                return redirect()->back()->with('message', 'Sửa thương hiệu thành công');
            }
        }

        // Xóa thương hiệu
        public function delete_brand($idBrand){
            Brand::where('idBrand', $idBrand)->delete();
            return redirect()->back();
        }

        /* Liệt kê danh sách thương hiệu
        public function fetch_brand(){
            $fetch_brand = Brand::get();
            $output = '';
            
            foreach($fetch_brand as $key => $brand){
                $output .= '
                <tr>
                    <td>'.$brand->idBrand.'</td>
                    <td>'.$brand->BrandName.'</td>
                    <td>
                        <div class="d-flex align-items-center list-action">
                            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                href=""><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa"
                                href=""><i class="ri-delete-bin-line mr-0"></i></a>
                        </div>
                    </td>
                </tr>';
            };  
            echo $output;  
        }*/ 

    /* ---------- End Admin ---------- */

    /* ---------- Shop ---------- */
    /* ---------- End Shop ---------- */

}
