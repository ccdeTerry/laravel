<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UsersController extends Controller
{
    //注册现实
    public function  create(){
        return view('users.create');
    }
    //获取用户信息
    public function show($id){
        $user= User::FindOrFail($id);
        $user->gravatar();
        return view('users.show',compact('user'));
    }
    
}
