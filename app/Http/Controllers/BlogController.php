<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Brand;

class BlogController extends Controller
{
    /* ---------- Admin ---------- */
    
        // Kiểm tra đăng nhập
        public function checkLogin(){
            $idAdmin = Session::get('idAdmin');
            if($idAdmin == false) return Redirect::to('admin')->send();
        }

        // Chuyển đến trang quản lý bài viết
        public function manage_blog(){
            $this->checkLogin();
            $list_blog = Blog::get();
            $count_blog = Blog::count();
            return view("admin.blog.manage-blog")->with(compact('list_blog', 'count_blog'));
        }

        // Chuyển đến trang thêm bài viết
        public function add_blog(){
            $this->checkLogin();
            return view("admin.blog.add-blog");
        }

        // Chuyển đến trang sửa bài viết
        public function edit_blog($idBlog){
            $this->checkLogin();
            $blog = Blog::where('idBlog', $idBlog)->first();
            return view("admin.blog.edit-blog")->with(compact('blog'));
        }

        // Thêm bài viết
        public function submit_add_blog(Request $request){
            $data = $request->all();
            $blog = new Blog();

            $blog->BlogTitle = $data['BlogTitle'];
            $blog->BlogContent = $data['BlogContent'];
            $blog->Status = $data['Status'];
            $blog->BlogDesc = $data['BlogDesc'];
            $blog->BlogSlug = $data['BlogSlug'];
            
            $image = $request->file('BlogImage');
            $get_name_image = $image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/kidoldash/images/blog',$new_image);
            $blog->BlogImage = $new_image;
            
            $blog->save();
            return redirect()->back()->with('message', 'Thêm bài viết thành công');
        }

        // Sửa bài viết
        public function submit_edit_blog(Request $request, $idBlog){
            $data = $request->all();
            $blog = Blog::find($idBlog);

            $blog->BlogTitle = $data['BlogTitle'];
            $blog->BlogContent = $data['BlogContent'];
            $blog->Status = $data['Status'];
            $blog->BlogDesc = $data['BlogDesc'];
            $blog->BlogSlug = $data['BlogSlug'];
            
            if($request->file('BlogImage')){
                $image = $request->file('BlogImage');
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->storeAs('public/kidoldash/images/blog',$new_image);
                $blog->BlogImage = $new_image;

                $get_old_img = Blog::where('idBlog', $idBlog)->first();
                Storage::delete('public/kidoldash/images/blog/'.$get_old_img->BlogImage);
            }
            $blog->save();
            return redirect()->back()->with('message', 'Sửa bài viết thành công');
        }

        // Xóa bài viết
        public function delete_blog($idBlog){
            Blog::where('idBlog', $idBlog)->delete();
            return redirect()->back();
        }

    /* ---------- End Admin ---------- */

    /* ---------- Shop ---------- */

        public function show_blog(){
            $list_category = Category::get();
            $list_brand = Brand::get();
            $list_blog = Blog::where('Status','1')->paginate(9);
            return view("shop.blog.blog")->with(compact('list_category','list_brand','list_blog'));
        }

        public function blog_details($BlogSlug){
            $list_category = Category::get();
            $list_brand = Brand::get();
            $Blog = Blog::where('BlogSlug',$BlogSlug)->first();
            $list_new_blog = Blog::whereNotIn('BlogSlug',[$BlogSlug])->orderBy('created_at','desc')->limit(8)->get();

            if($Blog->Status == 0) return Redirect::to('home')->send();
            else{
                return view("shop.blog.blog-details")->with(compact('list_category','list_brand','Blog','list_new_blog'));
            }
        }

    /* ---------- End Shop ---------- */
}
