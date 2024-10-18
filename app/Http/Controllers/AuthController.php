<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(){
        if(auth()->guard('web')->check()){
            return redirect()->route('dashboard');
        }
        return view('authentication.login');
    }

    public function process_login(Request $request){

        if ($request->isMethod('post')){
            try {

                $validator =  Validator::make($request->all(),[
                    'email'=>'required|email',
                    'password'=>'required'
                ]);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator->errors())->withInput(); 
                }
                $credentials = $request->only('email', 'password');
                $remember = $request->has('remember');

                if (Auth::attempt($credentials, $remember)) {
                    // Authentication passed
                    return redirect()->route('dashboard')->with('success','Login Successfully');
                }else{
                    return back()->with('error','Invalid Credintails');
                }

                // Authentication failed
                return redirect()->back()->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage())->withInput();
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
