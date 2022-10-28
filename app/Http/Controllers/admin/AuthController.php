<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $validated = auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        if($validated){
            return redirect()->route('dashboard')->with('success','Login Successfull.');
        }else{
            return redirect()->back()->with('error','Invalid login details.');
        }
    }
    public function register(){
        return view('auth.register');
    }
    public function postRegister(Request $request){

        $user = new User;
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validated){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('loogin')->with('success','Register Successfull.');
        }else{
            return redirect()->back()->with('error','Error.');
        }
    }

}
