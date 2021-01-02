<?php

use App\Http\Controllers\danhmuc_sanpham;
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


//fontend
Route::get('/', 'HomeController@index');
Route::get('/trangchu', 'HomeController@index');
Route::post('/tim-kiem', 'HomeController@timkiem');
//danh muc san pham trong trang chu
Route::get('/danh-muc-san-pham/{sanpham_chinh_id}', 'danhmuc_sanpham@show_danhmuc_sanpham_home');
Route::get('/thuong-hieu-san-pham/{sanpham_chinh_id}', 'thuonghieu_sanpham@show_thuonghieu_sanpham_home');
Route::get('/chi-tiet-san-pham/{sanpham_chinh_id}', 'sanpham@show_sanpham_chinh_home');
//backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');

//danhmuc_sanpham => backend =>thêm ,xóa ,sửa ,{sanpham_doanhmuc_id} là lấy id của database
Route::get('/add-danhmuc-sanpham', 'danhmuc_sanpham@add_sanpham');
Route::get('/edit-danhmuc-sanpham/{sanpham_doanhmuc_id}', 'danhmuc_sanpham@edit_sanpham');
Route::get('/delete-danhmuc-sanpham/{sanpham_doanhmuc_id}','danhmuc_sanpham@delete_sanpham');
Route::get('/all-danhmuc-sanpham', 'danhmuc_sanpham@all_sanpham');
//ẩn hiện danhmuc_sanpham =>backend
Route::get('/unactive-danhmuc-sanpham/{sanpham_doanhmuc_id}', 'danhmuc_sanpham@unactive_sanpham');
Route::get('/active-danhmuc-sanpham/{sanpham_doanhmuc_id}', 'danhmuc_sanpham@active_sanpham');
Route::post('/save-sanpham', 'danhmuc_sanpham@save_sanpham');
Route::post('/update-sanpham/{sanpham_doanhmuc_id}', 'danhmuc_sanpham@update_sanpham');


//thuonghieu_sanpham =>backend
Route::get('/add-thuonghieu-sanpham', 'thuonghieu_sanpham@add_thuonghieu_sanpham');
Route::get('/edit-thuonghieu-sanpham/{sanpham_thuonghieu_id}', 'thuonghieu_sanpham@edit_thuonghieu_sanpham');
Route::get('/delete-thuonghieu-sanpham/{sanpham_thuonghieu_id}','thuonghieu_sanpham@delete_thuonghieu_sanpham');
Route::get('/all-thuonghieu-sanpham', 'thuonghieu_sanpham@all_thuonghieu_sanpham');
//ẩn hiện thuonghieu_sanpham =>backend
Route::get('/unactive-thuonghieu-sanpham/{sanpham_thuonghieu_id}', 'thuonghieu_sanpham@unactive_thuonghieu_sanpham');
Route::get('/active-thuonghieu-sanpham/{sanpham_thuonghieu_id}', 'thuonghieu_sanpham@active_thuonghieu_sanpham');
Route::post('/save-thuonghieu-sanpham', 'thuonghieu_sanpham@save_thuonghieu_sanpham');
Route::post('/update-thuonghieu-sanpham/{sanpham_thuonghieu_id}', 'thuonghieu_sanpham@update_thuonghieu_sanpham');



//sanpham =>backend
Route::get('/add-sanpham-chinh', 'sanpham@add_sanpham_chinh');
Route::get('/edit-sanpham-chinh/{sanpham_chinh_id}', 'sanpham@edit_sanpham_chinh');
Route::get('/delete-sanpham-chinh/{sanpham_chinh_id}','sanpham@delete_sanpham_chinh');
Route::get('/all-sanpham-chinh', 'sanpham@all_sanpham_chinh');
//ẩn hiện sanpham =>backend
Route::get('/unactive-sanpham-chinh/{sanpham_chinh_id}', 'sanpham@unactive_sanpham_chinh');
Route::get('/active-sanpham-chinh/{sanpham_chinh_id}', 'sanpham@active_sanpham_chinh');
Route::post('/save-sanpham-chinh', 'sanpham@save_sanpham_chinh');
Route::post('/update-sanpham-chinh/{sanpham_chinh_id}', 'sanpham@update_sanpham_chinh');

//gio hàng
Route::post('/show_giohang', 'giohang_sanpham@gio_hang');