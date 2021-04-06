<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ChanePassController extends Controller
{
    public function chanePass(Request $request, $id){
    $user = Auth::User();
    $pass = trim($request->current_password);
    $newPass = trim($request->password);
    if($user){
    	if(!(Hash::check($pass, $user->password))){
    		session()->flash('messages','Mật khẩu cũ không đúng! vui lòng thử lại!');
    		return redirect()->back();
    	}
    	if(strcmp($pass, $newPass)==0){
    		session()->flash('messages','Mật khẩu mới không được trùng với mật khẩu cũ!');
    		return redirect()->back();
    	}
    	$user->update([
    		'password'=> Hash::make($newPass)
    	]);
    	session()->flash('message','Đổi mật khẩu thành công!');
    	return redirect()->back();
    }
    }
}
