<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                //echo "Success"; die;
                /*Session::put('adminSession',$data['email']);*/
                return redirect(route('dashboard'));
            }else{
                //echo "failed"; die;
                return redirect(route('login'))->with('flash_message_error','Invalid email or password!');
            }
        }
        return view('backend.login');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect current password!');
            }
        }
    }


    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out successfully!');
    }
}
