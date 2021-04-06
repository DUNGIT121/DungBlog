<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\ChangeMailVerify;
use Session;

session_start();
class changeMailController extends Controller
{
	public function changeMail(Request $request, $id){
		$user = Auth::User();
		if($user){
			$current_email =strtolower($request->current_email);
			$email = strtolower($request->email);
			
			$resutl = User::where('id',$id)->where('email',$current_email)->first();
			
			$checkMail = User::where('email',$email)->get();
			// dd($checkMail);
			if(!$checkMail){
				session()->flash('messages','email đã có người sử dụng!');
				return redirect()->back();
			}

			if(!($resutl)){
				session()->flash('messages','email của bạn không tồn tại!');
				return redirect()->back();
			}
			if(strcmp($current_email, $email)==0){
				session()->flash('messages','email mới không được trùng với email cũ của bạn!');
				return redirect()->back();
			}
			$changeMail = $user->update([
				session::put('id', auth()->id()),
				session::put('name', $user->name),
				'email'=>$email,
				'email_verified_at'=>null
			]);
			\Mail::to($user->email)->send(new ChangeMailVerify($changeMail));
			session()->flash('message','Kiểm tra email để xác minh cập nhật tài khoản!');
			return redirect()->route('logouts.logout');
		}

	}
}
