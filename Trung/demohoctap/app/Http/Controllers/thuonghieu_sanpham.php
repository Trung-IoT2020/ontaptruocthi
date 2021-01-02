<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class thuonghieu_sanpham extends Controller
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
    public function add_thuonghieu_sanpham()
    {
            return view('admin.add_thuonghieu_sanpham');
    }
    public function all_thuonghieu_sanpham()
    {
        $this->kiemtra_login();
        $show_sanpham=DB::table('tbl_thuonghieu_sanpham')->get();
        $manager_sanpham = view('admin.all_thuonghieu_sanpham')->with('show_sanpham',$show_sanpham);
        return view('admin')->with('admin.all_thuonghieu_sanpham',$manager_sanpham);
    }
    public function save_thuonghieu_sanpham(Request $request)
    {
        $this->kiemtra_login();
        $data = array();
        $data['thuonghieu_name'] = $request->thuonghieu_name;
        $data['thuonghieu_desc'] = $request->thuonghieu_desc;
        $data['thuonghieu_status'] = $request->thuonghieu_status;
        
        DB::table('tbl_thuonghieu_sanpham')->insert($data);
        Session::put('message','Thêm thành công');
        return Redirect::to('add-thuonghieu-sanpham');
    }
    public function update_thuonghieu_sanpham(Request $request,$sanpham_thuonghieu_id)
    {
        $this->kiemtra_login();
        $data = array();
        $data['thuonghieu_name'] = $request->thuonghieu_name;
        $data['thuonghieu_desc'] = $request->thuonghieu_desc;
        DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_id',$sanpham_thuonghieu_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-danhmuc-sanpham');
    }

    public function edit_thuonghieu_sanpham($sanpham_thuonghieu_id)
    {
        $this->kiemtra_login();
        $edit_thuonghieu_sanpham = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_id',$sanpham_thuonghieu_id)->get();
        $manager_thuonghieu_sanpham = view('admin.edit_thuonghieu_sanpham')->with('edit_thuonghieu_sanpham',$edit_thuonghieu_sanpham);
        return view('admin')->with('admin.edit_thuonghieu_sanpham',$manager_thuonghieu_sanpham);
    }
    public function delete_thuonghieu_sanpham($sanpham_thuonghieu_id)
    {
        $this->kiemtra_login();
        $all_sanpham=DB::table('tbl_sanpham')
        ->join('tbl_thuonghieu_sanpham','tbl_thuonghieu_sanpham.thuonghieu_id','=','tbl_sanpham.thuonghieu_id')
        ->orderBy('tbl_sanpham.thuonghieu_id','desc')->get();
        $demsotrang = count($all_sanpham);
        
        
        DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_id',$sanpham_thuonghieu_id)->delete();
        Session::put('message',( "Số lượng sản phẩm : ".$demsotrang));
        return Redirect::to('all-thuonghieu-sanpham');
    }
    public function unactive_thuonghieu_sanpham($sanpham_thuonghieu_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_id',$sanpham_thuonghieu_id)->update(['thuonghieu_status'=>2]);
        Session::put('message','Không kích hoạt sản phẩm');
        return Redirect::to('all-thuonghieu-sanpham');
    }
    public function active_thuonghieu_sanpham($sanpham_thuonghieu_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_id',$sanpham_thuonghieu_id)->update(['thuonghieu_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm');
        return Redirect::to('all-thuonghieu-sanpham');
    }

//end function Admin page


    public function show_thuonghieu_sanpham_home($sanpham_chinh_id){
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
        
        // $category_by_id = DB::table('tbl_sampham')->join('tbl_doanhmuc_sanpham','tbl_doanhmuc_sanpham.sanpham_id','=','tbl_doanhmuc_sanpham.sanpham_id')->where('tbl_doanhmuc_sanpham.slug_category_product',$slug_category_product)->get();
        
        // $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();
       $category_by_id = DB::table('tbl_sanpham')->join('tbl_thuonghieu_sanpham','tbl_sanpham.thuonghieu_id','=','tbl_thuonghieu_sanpham.thuonghieu_id')->where('tbl_sanpham.thuonghieu_id',$sanpham_chinh_id)->get();
       //$category_name = DB::table('tbl_thuonghieu_sanpham')->where('tbl_doanhmuc_sanpham.sanpham_id',$category_by_id)->limit(1)->get();
        return view('pages.thuonghieu.show_ctth')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('category_by_id',$category_by_id);
        
        

        
    }


    
}
