<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use Auth;
use Validator;

class Login1Controller extends Controller
{
    public function getLogin(){
        return view('user/login1');
    }
     public function postLogin(Request $request){
       $rules=[
            'email' => 'required|min:3',
            'password' => 'required',
        ];
    
    $messages=[
            'email.required' => 'Nhập email vào',
            'name.min' => 'Tên quá ngắn',
            'price.required' => 'Bắt buộc nhập mat khau',
             
        ];

     $validator = Validator::make($request->all(),$rules,$messages);

     if ($validator->fails()) {
     	return redirect()->back()->withErrors($validator)->withInput();
     }else{
     	$email = $request->input('email');
     	$password = $request->input('password');
     	if (Auth::attempt(['email' => $email, 'password'=> $password])) {
            return redirect('admin');
     	}
     }
    
    }
}
