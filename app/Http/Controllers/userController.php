<?php

namespace App\Http\Controllers;

use App\userList;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Http\Requests\validateDangKy;
class userController extends Controller
{
    public function dangnhap(){
        return view('formDangNhap');
    }
    public function checkDangNhap(Request $request){
        $name =$request->username;
        $pass = $request->password;
        $user = userList::where('name', $name)->where('password', $pass)->first();
        if($user != null){
            session(['user' => $user]);
            if($request->has('remember')){
                return redirect()->route('home')->withCookie('name', $name, 86400);
            }
            else{
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->route('formdangnhap');
        }
    }

    public function dangKy(){
        return view('formDangKy');
    }
    public function checkDangKy(validateDangKy $request){
        $name = $request->name;
        $password = $request->password;
        $email = $request->email;

        $user = [
            'name' => $name,
            'password' => $password,
            'email' => $email,
        ];
        $checkDangKy = userList::insert($user);
        if ($checkDangKy)
            return redirect()->route('home');
        else
            return 'loi';

    }
    public function dangxuat(Request $request)
    {
        if($request->session()->has('user')){
            $request->session()->forget('user');
            if($request->hasCookie('name')){
                return redirect()->route('formdangnhap')->withCookie(Cookie::forget('user'));
            }
            else{
                return redirect()->route('formdangnhap');
            }

        }


    }
}
