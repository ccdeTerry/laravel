<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Validator;
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
    //用户注册处理注册业务逻辑
    public  function  store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

       $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        session()->flash('success','恭喜'.$user->name.',注册成功');
        return redirect()->route('users.show',[$user]);

    }
    
}
