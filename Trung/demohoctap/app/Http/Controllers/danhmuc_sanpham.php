<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class danhmuc_sanpham extends Controller
{
    public function kiemtra_login()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('dashboard');
        }
        else
        {
            return Redirect::to('admin')->send();
        }

    }
    public function add_sanpham()
    {
        $this->kiemtra_login();
            return view('admin.add_sanpham');
    }
    public function all_sanpham()
    {
        $this->kiemtra_login();
        $show_sanpham=DB::table('tbl_doanhmuc_sanpham')->get();
        $manager_sanpham = view('admin.all_sanpham')->with('show_sanpham',$show_sanpham);
        return view('admin')->with('admin.all_sanpham',$manager_sanpham);
    }
    public function save_sanpham(Request $request)
    {
        $this->kiemtra_login();
        $data = array();
        $data['sanpham_name'] = $request->sanpham_name;
        $data['sanpham_desc'] = $request->sanpham_desc;
        $data['sanpham_loai'] = $request->sanpham_loai;
        
        DB::table('tbl_doanhmuc_sanpham')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-danhmuc-sanpham');
    }
    public function update_sanpham(Request $request,$sanpham_doanhmuc_id)
    {
        $this->kiemtra_login();
        $data = array();
        $data['sanpham_name'] = $request->sanpham_name;
        $data['sanpham_desc'] = $request->sanpham_desc;
        DB::table('tbl_doanhmuc_sanpham')->where('sanpham_id',$sanpham_doanhmuc_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-danhmuc-sanpham');
    }

    public function edit_sanpham($sanpham_doanhmuc_id)
    {
        $this->kiemtra_login();
        $edit_doanhmuc_sanpham = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_id',$sanpham_doanhmuc_id)->get();
        $manager_doanhmuc_sanpham = view('admin.edit_sanpham')->with('edit_sanpham',$edit_doanhmuc_sanpham);
        return view('admin')->with('admin.edit_sanpham',$manager_doanhmuc_sanpham);
    }
    public function delete_sanpham($sanpham_doanhmuc_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_doanhmuc_sanpham')->where('sanpham_id',$sanpham_doanhmuc_id)->delete();
        Session::put('message','xóa sản phẩm thành công');
        return Redirect::to('all-danhmuc-sanpham');
    }
    public function unactive_sanpham($sanpham_doanhmuc_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_doanhmuc_sanpham')->where('sanpham_id',$sanpham_doanhmuc_id)->update(['sanpham_loai'=>2]);
        Session::put('message','Không kích hoạt sản phẩm');
        return Redirect::to('all-danhmuc-sanpham');
    }
    public function active_sanpham($sanpham_doanhmuc_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_doanhmuc_sanpham')->where('sanpham_id',$sanpham_doanhmuc_id)->update(['sanpham_loai'=>1]);
        Session::put('message','Kích hoạt sản phẩm');
        return Redirect::to('all-danhmuc-sanpham');
    }
//end function Admin page


    public function show_danhmuc_sanpham_home($sanpham_chinh_id){
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
        
        // $category_by_id = DB::table('tbl_sampham')->join('tbl_doanhmuc_sanpham','tbl_doanhmuc_sanpham.sanpham_id','=','tbl_doanhmuc_sanpham.sanpham_id')->where('tbl_doanhmuc_sanpham.slug_category_product',$slug_category_product)->get();
        
        // $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();
       $category_by_id = DB::table('tbl_sanpham')->join('tbl_doanhmuc_sanpham','tbl_sanpham.sanpham_id','=','tbl_doanhmuc_sanpham.sanpham_id')->where('tbl_sanpham.sanpham_id',$sanpham_chinh_id)->get();
       //$category_name = DB::table('tbl_thuonghieu_sanpham')->where('tbl_doanhmuc_sanpham.sanpham_id',$category_by_id)->limit(1)->get();
        return view('pages.danhmuc.show_ctdm')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('category_by_id',$category_by_id);
        
        

        
    }


}
