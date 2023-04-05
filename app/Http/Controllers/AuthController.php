<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class AuthController extends Controller
{
 public function register(){
    return view('e-commerce.register');
 }

 public function registerUser(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|string',
            'password_verify'=>'required|string|min:8|same:password',
            'check'=>'accepted'
        ]);

        $user= new User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->password_verify=bcrypt($request->password_verify);

        $Save_user = $user->save();

        if($Save_user){
            return back()->with('register_success','You has register Successfuly');
        }
        else{
            return back()->with('register_error','Something wrong !');
        }

 }
}
