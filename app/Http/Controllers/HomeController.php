<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->akses=="Siswa" or Auth::user()->akses=="Ortu"){
                return redirect('u/dashboard');
            }else if(Auth::user()->akses=="Admin" or Auth::user()->akses=="Piket"){
                return view('admin/dashboard');
            }
        }else{
            return view('layouts/home');
        }
    }
}
