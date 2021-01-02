<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class sanpham extends Controller
{
    //kiem tra dang nhap
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

    public function add_sanpham_chinh()
    {
        $this->kiemtra_login();
        $sanpham = DB::table('tbl_doanhmuc_sanpham')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->orderBy('thuonghieu_id','desc')->get();
        
            return view('admin.add_sanpham_chinh')->with('sanpham',$sanpham)->with('thuonghieu', $thuonghieu);
    }
    public function all_sanpham_chinh()
    {
        $this->kiemtra_login();  
        $all_sanpham=DB::table('tbl_sanpham')
        ->join('tbl_doanhmuc_sanpham','tbl_doanhmuc_sanpham.sanpham_id','=','tbl_sanpham.sanpham_id')
        ->join('tbl_thuonghieu_sanpham','tbl_thuonghieu_sanpham.thuonghieu_id','=','tbl_sanpham.thuonghieu_id')
        ->orderBy('tbl_sanpham.sanpham_chinh_id','desc')->get();
        
        $manager_sanpham = view('admin.all_sanpham_chinh')->with('all_sanpham',$all_sanpham);
        
        return view('admin')->with('admin.all_sanpham_chinh',$manager_sanpham);
    }
    public function save_sanpham_chinh(Request $request)
    { 
        $this->kiemtra_login();
        $data = array();
        $data['sanpham_id']= $request->doanhmuc_id;
        $data['thuonghieu_id']= $request->thuonghieu_id;
        $data['sanpham_chinh_name']= $request->sanpham_chinh_name;
        $data['sanpham_chinh_desc']= $request->sanpham_chinh_desc;
        $data['sanpham_chinh_content']= $request->sanpham_chinh_content;
        $data['sanpham_chinh_price']= $request->sanpham_chinh_price;
        $data['sanpham_chinh_status']= $request->sanpham_chinh_status;

        $get_image = $request->file('sanpham_chinh_image');
        if($get_image)
        {
            $this->kiemtra_login();
            $get_name_img = $get_image->getClientOriginalName();//lấy tên của cái hình họ post
            $name_img = current(explode('.',$get_name_img));//explode phân tách ra bở dấu ."(hinh.jpg)" thành 2 chuổi//current lấy chuổi đầu "(hinh)"
            $new_img = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();//gắn chuổi đầu thêm vào rand(0,99)// getClientOriginalExtension lấy đuôi (.jpg,...)
            $get_image->move('public/image/sanpham',$new_img);//nơi lưu hình
            $data['sanpham_chinh_image']= $new_img;
            DB::table('tbl_sanpham')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-sanpham-chinh');

        }
        $data['sanpham_chinh_image']='';
        DB::table('tbl_sanpham')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-sanpham-chinh');
    }

    public function edit_sanpham_chinh($sanpham_chinh_id)
    {
        $this->kiemtra_login();
        $sanpham = DB::table('tbl_doanhmuc_sanpham')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->orderBy('thuonghieu_id','desc')->get();
        $edit_sanpham = DB::table('tbl_sanpham')->where('sanpham_chinh_id',$sanpham_chinh_id)->get();
        $manager_sanpham = view('admin.edit_sanpham_chinh')->with('edit_sanpham_chinh',$edit_sanpham)->with('sanpham_id',$sanpham)->with('thuonghieu_id',$thuonghieu);
        return view('admin')->with('admin.edit_sanpham_chinh',$manager_sanpham);
    }



    public function update_sanpham_chinh(Request $request,$sanpham_chinh_id)
    {
        $this->kiemtra_login();
        $data = array();
        $data['sanpham_id']= $request->sanpham_id_1;
        $data['thuonghieu_id']= $request->thuonghieu_id_1;
        $data['sanpham_chinh_name']= $request->sanpham_chinh_name_1;
        $data['sanpham_chinh_desc']= $request->sanpham_chinh_desc_1;
        $data['sanpham_chinh_content']= $request->sanpham_chinh_content_1;
        $data['sanpham_chinh_price']= $request->sanpham_chinh_price_1;
        $data['sanpham_chinh_status']= $request->sanpham_chinh_status_1;

        $get_image = $request->file('sanpham_chinh_image_1');
        if($get_image)
        {
            $get_name_img = $get_image->getClientOriginalName();//lấy tên của cái hình họ post
            $name_img = current(explode('.',$get_name_img));//explode phân tách ra bở dấu ."(hinh.jpg)" thành 2 chuổi//current lấy chuổi đầu "(hinh)"
            $new_img = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();//gắn chuổi đầu thêm vào rand(0,99)// getClientOriginalExtension lấy đuôi (.jpg,...)
            $get_image->move('public/image/sanpham',$new_img);//nơi lưu hình
            $data['sanpham_chinh_image']= $new_img;



        }
        //chưa cập nhật xong
        
        DB::table('tbl_sanpham')->where('sanpham_chinh_id',$sanpham_chinh_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-sanpham-chinh');
    }

   
    public function delete_sanpham_chinh($sanpham_chinh_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_sanpham')->where('sanpham_chinh_id',$sanpham_chinh_id)->delete();
        Session::put('message','xóa sản phẩm thành công');
        return Redirect::to('all-sanpham-chinh');
    }
    public function unactive_sanpham_chinh($sanpham_chinh_id)
    {
        $this->kiemtra_login();
        DB::table('tbl_sanpham')->where('sanpham_chinh_id',$sanpham_chinh_id)->update(['sanpham_chinh_status'=>2]);
        Session::put('message','Không kích hoạt sản phẩm');
        return Redirect::to('all-sanpham-chinh');
    }
    public function active_sanpham_chinh($sanpham_chinh_id)
    {
         $this->kiemtra_login();
        DB::table('tbl_sanpham')->where('sanpham_chinh_id',$sanpham_chinh_id)->update(['sanpham_chinh_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm');
        return Redirect::to('all-sanpham-chinh');
    }

    //
    public function show_sanpham_chinh_home($sanpham_chinh_id)
    { $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
        $show_chitiet = DB::table('tbl_sanpham')
        ->join('tbl_doanhmuc_sanpham','tbl_doanhmuc_sanpham.sanpham_id','=','tbl_sanpham.sanpham_id')
        ->join('tbl_thuonghieu_sanpham','tbl_thuonghieu_sanpham.thuonghieu_id','=','tbl_sanpham.thuonghieu_id')
        ->where('tbl_sanpham.sanpham_chinh_id',$sanpham_chinh_id)->get();


        foreach( $show_chitiet as $key =>$values){
            $sanpham_chinh_id =$values->sanpham_chinh_id;
        }
        $show_hinhanhthem = DB::table('tbl_sanpham')
        ->join('tbl_doanhmuc_sanpham','tbl_doanhmuc_sanpham.sanpham_id','=','tbl_sanpham.sanpham_id')
        ->join('tbl_thuonghieu_sanpham','tbl_thuonghieu_sanpham.thuonghieu_id','=','tbl_sanpham.thuonghieu_id')
        ->where('tbl_doanhmuc_sanpham.sanpham_id',$sanpham_chinh_id)->get();

        return view('pages.sanpham.show_ctsp')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('show_chitiet',$show_chitiet)->with('show_hinhanhthem',$show_hinhanhthem);
    }
}
