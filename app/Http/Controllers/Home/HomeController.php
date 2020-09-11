<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
class HomeController extends Controller
{
  // public function __construct()
  // {
   
  //   $data_send = ['media_slider' => $media_slider];
  //   View::share($data_send);
  // } 
  public function index()
  {
    return view("home.home");
  }
}
