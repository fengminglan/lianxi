<?php

namespace App\Http\Controllers\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
    public function test(){
        $user = DB::table('user')->where('id',1)->first();
        var_dump($user);exit;
    }
}