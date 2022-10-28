<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function dashboard(){
        if(Auth::check()){
            return view('auth.dashboard');
        }else{
            return redirect('/');
        }
    }
}
