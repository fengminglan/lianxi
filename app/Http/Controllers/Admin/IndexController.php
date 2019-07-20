<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller{
    //后台首页
    public function index(){
        return view('admin.index');
    }

    //跳转页面
    public function jump($string){
        $string = str_replace('.','/',$string);
        return view("admin/$string");
    }
}