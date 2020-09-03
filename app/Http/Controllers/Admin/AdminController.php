<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminController extends Controller
{
  public function login()
  {
    return view('admin.login');
  }
  public function dangnhap(Request $req )
  {
    $data = $req->all();
    //print_r($data);
    if (Auth::attempt(['email' =>$data['email'], 'password' => $data['password'], 'status' => '1'])) {
            $msg = [
      'status' => '_success',
      'msg'    => 'Loading ...'
    ];
    return response()->json($msg);
    }
    else {
          $msg = [
      'status' => '_error',
      'msg'    => 'Tài khoản hoặc mật khẩu sai
      '
    ];
    return response()->json($msg);
    }
  }
  public function dashboard()
  {
    return view('admin.dashboard');
  }
}
