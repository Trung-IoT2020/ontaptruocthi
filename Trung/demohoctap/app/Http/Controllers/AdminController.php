<?php

namespace App\Http\Controllers;
//thư viện
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
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

    
    public function index(){
        return view('login_admin');

    }
    public function show_dashboard()
    {
        $this->kiemtra_login();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_mail;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_mail',$admin_email)->where('admin_password',$admin_password)->first();
        if($result)
        {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');

        }
        else
        {
            Session::put('message',"<h3>Mật khẩu hoặc tài khoản không đúng vui lòng nhập lại!</h3>");
            return Redirect::to('/admin');

        }
    }

    public function logout(Request $request)
    {
        $this->kiemtra_login();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        
        return Redirect::to('/admin');
    }
}
