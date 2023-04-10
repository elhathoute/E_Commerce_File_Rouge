<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\ValidCity;
use App\Rules\ValidPostal;
use App\Rules\ValidPassword;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // change_compte_user
    public function change_compte_user(Request $request,$id){
        // dd($request->all(), $id);

        $user = User::findOrFail($id);
        $validatedData= $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'password_old' => ['required',new ValidPassword],
            'password_new' => ['required','min:8','different:password_old'],
            'password_confirm' => ['required','min:8','same:password_new'],
        ]);

        // $user = User::where('id', $request->id)->firstOrFail();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password_new']);

        $updateCompteUser=$user->update();
        if(!$updateCompteUser){

            return back()->withInput();
        }
        else{

           return  redirect('/');
        }


    }
    // change adress of user
    public function change_adress_user(Request $request,$id){
        // dd($user);
       $validatedData= $request->validate([
            'country' => 'required|string',
            'city' => ['required',new ValidCity],
            'postal'=>['nullable',new ValidPostal],
            'phone'=>'required|string|min:10|max:13',
            'address'=>'required|string|min:8'
        ]);

    //
        // $user = User::where('id', $request->id)->firstOrFail();
        $user = User::findOrFail($id);

        $user->country = $validatedData['country'];
        $user->city = $validatedData['city'];
        $user->postal = $validatedData['postal'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];

        $updateUser=$user->update();

        if(!$updateUser){
            return back()->withInput();
        }
        else{
           return  redirect('/');
        }



    }

    // profile
    public function profile(){
        return view('e-commerce.user.profile');
    }
    // register
 public function register(){
    return view('e-commerce.register');
 }

 public function registerUser(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|string',
            'password_verify'=>'required|string|min:8|same:password',
            'check_field'=>'accepted'
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
            return back()->with('register_error','Something wrong !')->withInput();
        }

 }
//  login
public function login(){
    return view('e-commerce.login');
 }
 public function loginUser(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8|string',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect('/');
    }
       return back()->with('email_error','Login are not Valid')->withInput();


    // $user =User::where('email','=',$request->email)->first();

    // if($user){
    //     // password correct
    //     if(Hash::check($request->password,$user->password))
    //     {

    //         $request->session()->put('user',$user);
    //        return  redirect('/');
    //     }
    //     // password not correct
    //     else{
    //         return back()->with('password_error','Password not correct')->withInput();
    //     }

    // }
    // else{
    //     return back()->with('email_error','Email not Exist')->withInput();
    // }


 }
//  logout
public function logout(){
    Session::flush();
    Auth::logout();
    return Redirect('login');
}
}
