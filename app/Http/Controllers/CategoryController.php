<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;

class CategoryController extends Controller
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

        // Chuyển đến trang quản lý danh mục
        public function manage_category(){
            $this->checkLogin();
            $this->checkPostion();
            $list_category = Category::get();
            $count_category = Category::count();
            return view("admin.category.manage-category")->with(compact('list_category', 'count_category'));
        }

        // Chuyển đến trang thêm danh mục
        public function add_category(){
            $this->checkLogin();
            $this->checkPostion();
            return view("admin.category.add-category");
        }

        // Chuyển đến trang sửa danh mục
        public function edit_category($idCategory){
            $this->checkLogin();
            $this->checkPostion();
            $select_category = Category::where('idCategory', $idCategory)->first();
            return view("admin.category.edit-category")->with(compact('select_category'));
        }

        // Thêm danh mục
        public function submit_add_category(Request $request){
            $data = $request->all();
            $category = new Category();
            
            $select_category = Category::where('CategoryName', $data['CategoryName'])->first();

            if($select_category){
                return Redirect::to('add-category')->with('error', 'Tên danh mục này đã tồn tại');
            }else{
                $category->CategoryName = $data['CategoryName'];
                $category->CategorySlug = $data['CategorySlug'];
                $category->save();
                return Redirect::to('add-category')->with('message', 'Thêm danh mục thành công');
            }
        }

        // Sửa danh mục
        public function submit_edit_category(Request $request, $idCategory){
            $data = $request->all();
            $category = Category::find($idCategory);
            
            $select_category = Category::where('CategoryName', $data['CategoryName'])->whereNotIn('idCategory',[$idCategory])->first();

            if($select_category){
                return redirect()->back()->with('error', 'Tên danh mục này đã tồn tại');
            }else{
                $category->CategoryName = $data['CategoryName'];
                $category->CategorySlug = $data['CategorySlug'];
                $category->save();
                return redirect()->back()->with('message', 'Sửa danh mục thành công');
            }
        }

        // Xóa danh mục
        public function delete_category($idCategory){
            Category::where('idCategory', $idCategory)->delete();
            return redirect()->back();
        }

    /* ---------- End Admin ---------- */

    /* ---------- Shop ---------- */
    
    /* ---------- End Shop ---------- */
}
