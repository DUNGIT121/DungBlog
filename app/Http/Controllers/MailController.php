<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use App\Models\User;
use carbon\Carbon;

class MailController extends Controller
{
	public function emailVerify($id){
		if($id == null){
			session()->flash('messages','thông tin đăng nhập không hợp lệ!');
			return redirect()->route('logins.index');
		}
		$user = User::where('id', $id)->first();
		if($user == null){
			session()->flash('messages','thông tin đăng nhập không hợp lệ!');
			return redirect()->route('logins.index');
		}

		$user->update(['email_verified_at' => Carbon::now()]);
		session()->flash('message','Tài khoản của bạn đã được kích hoạt, bây giờ bạn có thể đăng nhập!');
		return redirect()->route('logins.index');
	}
	public function changeMailVerify($id){
		if($id == null){
			session()->flash('messages','thông tin đăng nhập không hợp lệ!');
			return redirect()->route('logins.index');
		}
		$user = User::where('id', $id)->first();
		if($user == null){
			session()->flash('messages','thông tin đăng nhập không hợp lệ!');
			return redirect()->route('logins.index');
		}

		$user->update(['email_verified_at' => Carbon::now()]);
		session()->flash('message','Cập nhật tài khoản thành công!, bây giờ bạn có thể đăng nhập!');
		return redirect()->route('logins.index');
	}
}
