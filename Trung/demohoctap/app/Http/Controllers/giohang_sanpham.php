<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class giohang_sanpham extends Controller
{
    public function gio_hang(Request $request){
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
    	$product_Id = $request->sanpham_id_hidden;
    	$quantity = $request->soluong_sanpham;
        
        $product_info = DB::table('tbl_sanpham')->where('sanpham_chinh_id',$product_Id)->first();

        
        return view('pages.giohang.show_giohang')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu);
    }
}
