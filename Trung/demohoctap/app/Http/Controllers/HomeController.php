<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\paginate;
use App\Http\Controllers\sanpham;
session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
       
        // $all_sanpham=DB::table('tbl_sanpham')
        // ->join('tbl_doanhmuc_sanpham','tbl_doanhmuc_sanpham.sanpham_id','=','tbl_sanpham.sanpham_id')
        // ->join('tbl_thuonghieu_sanpham','tbl_thuonghieu_sanpham.thuonghieu_id','=','tbl_sanpham.thuonghieu_id')
        // ->orderBy('tbl_sanpham.sanpham_chinh_id','desc')->get();
        $all_sanpham = DB::table('tbl_sanpham')->where('sanpham_chinh_status','1')->orderBy('sanpham_chinh_id','desc')->get();
        $daphantrang =  DB::table('tbl_sanpham')->simplePaginate(3);
        return view('pages.home')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('sanpham',$all_sanpham)->with('daphantrang',$daphantrang);
    }
    
    public function timkiem(Request $request)
    {
        $keywords = $request -> keywords_submit;
        $key_price = $request -> keywords_price;
        $danhmuc = DB::table('tbl_doanhmuc_sanpham')->where('sanpham_loai','1')->orderBy('sanpham_id','desc')->get();
        $thuonghieu = DB::table('tbl_thuonghieu_sanpham')->where('thuonghieu_status','1')->orderBy('thuonghieu_id','desc')->get();
        
        $search_product = DB::table('tbl_sanpham')->where('sanpham_chinh_name','like','%'.$keywords.'%')->get();

        $search_price = DB::table('tbl_sanpham')->where('sanpham_chinh_price','like','%'.$key_price.'%')->orderBy('ASC')->get();
        return view('pages.sanpham.search')->with('danhmuc',$danhmuc)->with('thuonghieu',$thuonghieu)->with('search_product',$search_product)->with('search_price',$search_price);

    }
}
