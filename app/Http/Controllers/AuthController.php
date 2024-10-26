<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
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
                    $user = Auth::user();
                    if($user->status == 1){
                        // Authentication passed
                        return redirect()->route('dashboard')->with('success','Login Successfully');
                    }
                    Auth::logout();

                    return back()->with('error','Access restricted. Your account does not have the necessary permissions to Log In');

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

    public function change_password(){
        return view('authentication.reset_password');
    }

    public function process_change_password(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $obj = User::find(Auth::id());
                $obj->password = bcrypt($request->password);
                $res = $obj->update();
                if($res){
                    Auth::logout();
                    return redirect()->route('login')->with('success','Password Changed Successfully, Please Login With Your New Password');
                }else{
                    return back()->withErrors(['error'=>'Password Chnaged Successfully']);
                }
            } else {
                return back()->withErrors(['error'=>'Not Matched Old Password']);
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Successfully');
    }
}
