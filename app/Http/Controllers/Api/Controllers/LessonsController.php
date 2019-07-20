<?php
namespace App\Http\Controllers\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class LessonsController extends Controller {
     public  function index(){
        return response()->json(['connect'=>'hello word']);
     }
    public  function ceshi(Request $request){
         $rules = [
             'name'=>'required',
             'user_id'=>'required',
             'connect'=>'required',
             'connect_id'=>'required|integer'
         ];
        $data = $request->all();
        $validator = validator($data,$rules);
        if ($validator->fails()){
            return $validator->errors()->first();
        }
        $data['id'] = rand(0,1);
        $res = DB::table('roles')->insert($data);
        return response()->json($res);
    }
    public function getCeshi(){
//         $data = DB::table('user')->get();
//         $data = json_encode($data,true);
//         Redis::set('shuju',$data);
         var_dump(Redis::get('shuju'));exit;
         return $data;
    }
    public function lang($lang,Request $request){
        App::setLocale($lang);
        $rules = [
            'name'=>'required'
        ];
        $data = $request->all();
        $validator = validator($data,$rules);
        if ($validator->fails()){
            return $validator->errors()->first();
        }
        return 1;
    }
    public function insertTitle(Request $request){
         $rules=[
             'name'=>'required'
         ];
         $name = $request->input('name');
         $validator = validator(['name'=>$name],$rules);
        if ($validator->fails()){
            return $validator->errors()->first();
        }
        DB::table('info')->insert(['name'=>$name]);
        return response()->json($name);
    }

    public function register(Request $request){
         $rule = [
             'name'=>'required',
             'email'=>'required|email',
             'password'=>'required|max:16|min:6'
         ];
        $data = $request->input();
        $vaildator = validator($data,$rule);
        if ($vaildator->fails()){
            return $vaildator->errors()->first();
        }
        $data['password'] = Hash::make($data['password']);
        $res = DB::table('users')->insert($data);
        if ($res){
            return ['success'=>true,'msg'=>'请求成功'];
        }else{
            return ['success'=>false,'msg'=>'请求失败'];
        }
    }
    public function login(){
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = auth('api')->user();
        var_dump($user);exit;
    }
}