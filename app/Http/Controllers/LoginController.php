<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

session_start();

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auths.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoginRequest $request)
    {
        $checkLogin = $request->only('email','password');
        $user = User::where('email', $request->email)->first();
        if(!(Auth::attempt($checkLogin))){
            session()->flash('messages','Thông tin đăng nhập không hợp lệ!');
            return redirect()->back();
        }
        elseif($user->email_verified_at == null){            
            session()->flash('messages','Tài khoản của bạn chưa được kích hoạt. vui lòng kiểm tra email để kích hoạt tài khoản!');
            return redirect()->back();
        }
        else{
            session()->flash('message', 'Chào mừng bạn đến với Dung-Blog!');
            Session::put('name', $user->name);
            return redirect()->route('homes.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
