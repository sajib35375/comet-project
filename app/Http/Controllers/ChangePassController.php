<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function passChange(){
        return view('admin.passwordchange');
    }
    public function passChangeUp(Request $request){
        $pass = Auth::user()->password;


        if (password_verify($request->old_password,$pass)){
            $user=User::find(Auth::user()->id);
            $user->password = password_hash($request->password,PASSWORD_DEFAULT);
            $user->update();
            Auth::logout();
            return redirect()->back();
        }



    }
}
