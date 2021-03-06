<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['adminLogin','adminRegister']);
    }


     public function adminLogin(){
         return view('admin.login');
     }
     public function adminRegister(){
         return view('admin.register');
     }
     public function adminDashboard(){
         return view('admin.dashboard');
     }
}
