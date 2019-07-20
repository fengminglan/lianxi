<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email'=>$email,'password'=>$password])){
           return view('auth.info');
        }else{
            return ['success'=>false,'msg'=>'password error'];
        }
    }
    public function add(Request $request){
        $data = $request->input();
        if (!isset($data['AppId'])){
            return response()->json(['success'=>false,'msg'=>'AppId必填']);
        }
        $res =  DB::table('app_info')->where('AppId',$data['AppId'])->value('id');
        if (!empty($res)){
            return response()->json(['success'=>false,'msg'=>'AppId已存在']);
        }
        DB::table('app_info')->insert($data);
        return response()->json(['success'=>true,'msg'=>'插入成功']);
    }
    public function update(Request $request){
        $data = $request->input();
        if (!isset($data['AppId'])){
            return response()->json(['success'=>false,'msg'=>'AppId必填']);
        }
        $id =  DB::table('app_info')->where('AppId',$data['AppId'])->value('id');
        if ($id !== $data['id']){
            return response()->json(['success'=>false,'msg'=>'AppId已存在']);
        }
        DB::table('app_info')->find($data['id'])->update($data);
        return response()->json(['success'=>true,'msg'=>'修改成功']);
    }
    public function index(){
        $data = DB::table('app_info')->select();
        return response()->json(['success'=>true,'data'=>$data]);
    }
    public function selectByAppId(Request $request){
        $appId = $request->input('AppId');
        if (empty($appId) || !isset($appId)){
            return response()->json(['success'=>false,'code'=>201,'msg'=>'appId必填']);
        }
        $res = DB::table('app_info')->where('AppId',$appId)->first();
        $data = json_encode([
            'AppId'=>$res->AppId,
            'PushKey'=>$res->PushKey,
            'UrlStr'=>$res->UrlStr,
            'UpdateUrl'=>$res->UpdateUrl,
            'Type'=>$res->Type,
        ]);
        $data = base64_encode($data);
        return response()->json(['success'=>true,'code'=>200,'data'=>$data]);
    }
}